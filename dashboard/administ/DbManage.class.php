<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    // echo "administ"."<br>";
/**
 * ------1. database backup (output)------------------------------------------------------------
//The values below are host address, username, password, name of database, charset respectively
$db = new DBManage ( 'localhost', 'root', 'root', 'test', 'utf8' );
// parameter：table name (optional), directory name (optional, default value is backup), volume size (optional, default value is 2M)
$db->backup ();
 * ------2. database backup (input)------------------------------------------------------------
//parameter：sql file
$db->restore ( './backup/20150516211738_all_v1.sql');
 *----------------------------------------------------------------------
 */
class DbManage {
    var $db; // database address
    var $database; // database name
    var $sqldir; // backup directory
    // 
    private $ds = "\n";
    // 
    public $sqlContent = "";
    // 
    public $sqlEnd = ";";
    /**
     * initilization
     *
     * @param string $host
     * @param string $username
     * @param string $password
     * @param string $database
     * @param string $charset
     */
    function __construct($host = 'localhost', $username = 'root', $password = '', $database = 'test', $charset = 'utf8') {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->charset = $charset;
        set_time_limit(0);//time of expire is unlimited
@ob_end_flush();
        // connect to database
        $this->db = @mysql_connect ( $this->host, $this->username, $this->password ) or die( '<p class="dbDebug"><span class="err">Mysql Connect Error : </span>'.mysql_error().'</p>');
        // choose which database to use
        mysql_select_db ( $this->database, $this->db ) or die('<p class="dbDebug"><span class="err">Mysql Connect Error:</span>'.mysql_error().'</p>');
        // way of coding
        mysql_query ( 'SET NAMES ' . $this->charset, $this->db );
    }

    function getTables() {
        $res = mysql_query ( "SHOW TABLES" );
        $tables = array ();
        while ( $row = mysql_fetch_array ( $res ) ) {
            $tables [] = $row [0];
        }
        return $tables;
    }
    /*
     *
     * ------------------------------------------database back up starts----------------------------------------------------------
     */
    /**
     * database back up
     * parameter：table name (optional), directory name (optional, default value is backup), volume size (optional, default value is 2M)
     *
     * @param $string $dir
     * @param int $size
     * @param $string $tablename
     */
    function backup($tablename = '', $dir, $size) {
        $dir = $dir ? $dir : './backup/';
        // create directory
        if (! is_dir ( $dir )) {
            mkdir ( $dir, 0777, true ) or die ( 'file to create directory' );
        }
        $size = $size ? $size : 2048;
        $sql = '';
        // choose specific folder to backup
        if (! empty ( $tablename )) {
            if(@mysql_num_rows(mysql_query("SHOW TABLES LIKE '".$tablename."'")) == 1) {
             } else {
                $this->_showMsg('table-<b>' . $tablename .'</b>- does not exist！',true);
                die();
            }
            $this->_showMsg(' <span class="imp"> is being backup' . $tablename.'</span>');
            // insert dump info
            $sql = $this->_retrieve ();
            // insert table info
            $sql .= $this->_insert_table_structure ( $tablename );
            // insert data
            $data = mysql_query ( "select * from " . $tablename );
            // insert current time in file name
            $filename = date ( 'YmdHis' ) . "_" . $tablename;
            // volume number
            $num_fields = mysql_num_fields ( $data );
            // the number of volume
            $p = 1;
            // iteration
            while ( $record = mysql_fetch_array ( $data ) ) {
                // single record
                $sql .= $this->_insert_record ( $tablename, $num_fields, $record );
                // if size is bigger than volume limitation, split it
                if (strlen ( $sql ) >= $size * 1024) {
                    $file = $filename . "_v" . $p . ".sql";
                    if ($this->_write_file ( $sql, $file, $dir )) {
                        $this->_showMsg("table-<b>" . $tablename . "</b>-volume-<b>" . $p . "</b>-backup is complete,backup file [ <span class='imp'>" .$dir . $file ."</span> ]");
                    } else {
                        $this->_showMsg("backup table -<b>" . $tablename . "</b>- failed",true);
                        return false;
                    }
                    // next volume
                    $p ++;
                    // reset sql variable to empty, recalculate its size
                    $sql = "";
                }
            }
            // clear the data
            unset($data,$record);
            // data is smaller than the limitation size of a single volume
            if ($sql != "") {
                $filename .= "_v" . $p . ".sql";
                if ($this->_write_file ( $sql, $filename, $dir )) {
                    $this->_showMsg( "table-<b>" . $tablename . "</b>-volume-<b>" . $p . "</b>-backup is complete, backup file [ <span class='imp'>" .$dir . $filename ."</span> ]");
                } else {
                    $this->_showMsg("backup volume-<b>" . $p . "</b>-failed<br />");
                    return false;
                }
            }
            $this->_showMsg("backup complete! <span class='imp'>.</span>");
        } else {
            $this->_showMsg('data is being backup');
            // backup all the table
            if ($tables = mysql_query ( "show table status from " . $this->database )) {
                $this->_showMsg("successfully read from database");
            } else {
                $this->_showMsg("read from database failed");
                exit ( 0 );
            }
            // inser dump info
            $sql .= $this->_retrieve ();
            // insert current time into file name
            $filename = date ( 'YmdHis' ) . "_all";
            // access the name of table
            $tables = mysql_query ( 'SHOW TABLES' );
            // the number of volume
            $p = 1;
            // iteration
            while ( $table = mysql_fetch_array ( $tables ) ) {
                // access the table anme
                $tablename = $table [0];
                // access the structual of table
                $sql .= $this->_insert_table_structure ( $tablename );
                $data = mysql_query ( "select * from " . $tablename );
                $num_fields = mysql_num_fields ( $data );
                // iterate all the table
                while ( $record = mysql_fetch_array ( $data ) ) {
                    // record a single infor
                    $sql .= $this->_insert_record ( $tablename, $num_fields, $record );
                    // if size if bigger than the limitation of a volume, split it
                    if (strlen ( $sql ) >= $size * 1000) {
                        $file = $filename . "_v" . $p . ".sql";
                        // file writing
                        if ($this->_write_file ( $sql, $file, $dir )) {
                            $this->_showMsg("-volume-<b>" . $p . "</b>-backup is complete, backup file [ <span class='imp'>".$dir.$file."</span> ]");
                        } else {
                            $this->_showMsg("volume-<b>" . $p . "</b>-backup failed!",true);
                            return false;
                        }
                        // next volume
                        $p ++;
                        // reset sql variable to empty, recalculate the size 
                        $sql = "";
                    }
                }
            }
            if ($sql != "") {
                $filename .= "_v" . $p . ".sql";
                if ($this->_write_file ( $sql, $filename, $dir )) {
                    $this->_showMsg("-volume-<b>" . $p . "</b>-backup is complete, backup file [ <span class='imp'>".$dir.$filename."</span> ]");
                } else {
                    $this->_showMsg("volume-<b>" . $p . "</b>-backup failed",true);
                    return false;
                }
            }
            $this->_showMsg("backup succeed! <span class='imp'></span>");
        }
    }

    private function _showMsg($msg,$err=false){
        $err = $err ? "<span class='err'>ERROR:</span>" : '' ;
        echo "<p class='dbDebug'>".$err . $msg."</p>";
        flush();
    }
    /**
     * insert backup info
     *
     * @return string
     */
    private function _retrieve() {
        $value = '';
        $value .= '--' . $this->ds;
        $value .= '-- MySQL database dump' . $this->ds;
        $value .= '-- Created by DbManage class, Power By yanue. ' . $this->ds;
        $value .= '-- My 662 Database Project ' . $this->ds;
        $value .= '--' . $this->ds;
        $value .= '-- Host: ' . $this->host . $this->ds;
        $value .= '-- generated date: ' . date ( 'm' ) . ' / ' . date ( 'd' ) . ' / ' . date ( 'Y' ) . ' /  ' . date ( 'H:i' ) . $this->ds;
        $value .= '-- MySQL Version: ' . mysql_get_server_info () . $this->ds;
        $value .= '-- PHP Version: ' . phpversion () . $this->ds;
        $value .= $this->ds;
        $value .= '--' . $this->ds;
        $value .= '-- database: `' . $this->database . '`' . $this->ds;
        $value .= '--' . $this->ds . $this->ds;
        $value .= '-- -------------------------------------------------------';
        $value .= $this->ds . $this->ds;
        return $value;
    }
    /**
     * insert the structure
     *
     * @param unknown_type $table
     * @return string
     */
    private function _insert_table_structure($table) {
        $sql = '';
        $sql .= "--" . $this->ds;
        $sql .= "-- structure" . $table . $this->ds;
        $sql .= "--" . $this->ds . $this->ds;
        $sql .= "DROP TABLE IF EXISTS `" . $table . '`' . $this->sqlEnd . $this->ds;
        $res = mysql_query ( 'SHOW CREATE TABLE `' . $table . '`' );
        $row = mysql_fetch_array ( $res );
        $sql .= $row [1];
        $sql .= $this->sqlEnd . $this->ds;
        $sql .= $this->ds;
        $sql .= "--" . $this->ds;
        $sql .= "-- resave the result of table " . $table . $this->ds;
        $sql .= "--" . $this->ds;
        $sql .= $this->ds;
        return $sql;
    }
    /**
     * insert a single record
     *
     * @param string $table
     * @param int $num_fields
     * @param array $record
     * @return string
     */
    private function _insert_record($table, $num_fields, $record) {
        $insert = '';
        $comma = "";
        $insert .= "INSERT INTO `" . $table . "` VALUES(";
        for($i = 0; $i < $num_fields; $i ++) {
            $insert .= ($comma . "'" . mysql_real_escape_string ( $record [$i] ) . "'");
            $comma = ",";
        }
        $insert .= ");" . $this->ds;
        return $insert;
    }
    /**
     * write file
     *
     * @param string $sql
     * @param string $filename
     * @param string $dir
     * @return boolean
     */
    private function _write_file($sql, $filename, $dir) {
        $dir = $dir ? $dir : './backup/';
        if (! is_dir ( $dir )) {
            mkdir ( $dir, 0777, true );
        }
        $re = true;
        if (! @$fp = fopen ( $dir . $filename, "w+" )) {
            $re = false;
            $this->_showMsg("file to open sql file!",true);
        }
        if (! @fwrite ( $fp, $sql )) {
            $re = false;
            $this->_showMsg("unable to write the file, please check the writeability of the file",true);
        }
        if (! @fclose ( $fp )) {
            $re = false;
            $this->_showMsg("unable to close sql file",true);
        }
        return $re;
    }
    /*
     *
     * -------------------------------Up: database output----------cuttoff----------Down: database input--------------------------------
     */
    /**
     * input database
     * instruction：volume format 20150516211738_all_v1.sql
     * parameter: the location of backup file
     *
     * @param string $sqlfile
     */
    function restore($sqlfile) {
        if (! file_exists ( $sqlfile )) {
            $this->_showMsg("the sql file does not exist, please check!",true);
            exit ();
        }
        $this->lock ( $this->database );
        $sqlpath = pathinfo ( $sqlfile );
        $this->sqldir = $sqlpath ['dirname'];
        $volume = explode ( "_v", $sqlfile );
        $volume_path = $volume [0];
        $this->_showMsg("data is being restored, please do not refresh the browser!!");
        $this->_showMsg("resotring, please wait");
        if (empty ( $volume [1] )) {
            $this->_showMsg ( "restore sql file：<span class='imp'>" . $sqlfile . '</span>');
            if ($this->_import ( $sqlfile )) {
                $this->_showMsg( "restoring succeed!");
            } else {
                 $this->_showMsg('restoring failed!',true);
                exit ();
            }
        } else {
            $volume_id = explode ( ".sq", $volume [1] );
            $volume_id = intval ( $volume_id [0] );
            while ( $volume_id ) {
                $tmpfile = $volume_path . "_v" . $volume_id . ".sql";
                
                if (file_exists ( $tmpfile )) {
                    
                    $this->msg .= "restoring volume $volume_id ：<span style='color:#f00;'>" . $tmpfile . '</span><br />';
                    if ($this->_import ( $tmpfile )) {
                    } else {
                        $volume_id = $volume_id ? $volume_id :1;
                        exit ( "restore volume:<span style='color:#f00;'>" . $tmpfile . '</span>failed, please backup from the first volume' );
                    }
                } else {
                    $this->msg .= "this volume has been restored!<br />";
                    return;
                }
                $volume_id ++;
            }
        }if (empty ( $volume [1] )) {
            $this->_showMsg ( "restoring sql：<span class='imp'>" . $sqlfile . '</span>');
            if ($this->_import ( $sqlfile )) {
                $this->_showMsg( "restoring succeed!");
            } else {
                 $this->_showMsg('restoring failed!',true);
                exit ();
            }
        } else {
            $volume_id = explode ( ".sq", $volume [1] );
            $volume_id = intval ( $volume_id [0] );
            while ( $volume_id ) {
                $tmpfile = $volume_path . "_v" . $volume_id . ".sql";
                if (file_exists ( $tmpfile )) {
                    $this->msg .= "restoring volume $volume_id ：<span style='color:#f00;'>" . $tmpfile . '</span><br />';
                    if ($this->_import ( $tmpfile )) {
                    } else {
                        $volume_id = $volume_id ? $volume_id :1;
                        exit ( "restore volume：<span style='color:#f00;'>" . $tmpfile . '</span>failed, please backup from the first volume' );
                    }
                } else {
                    $this->msg .= "this volume has been restored！<br />";
                    return;
                }
                $volume_id ++;
            }
        }
    }
    /**
     * normal restoring
     *
     * @param string $sqlfile
     * @return boolean
     */
    private function _import($sqlfile) {
        $sqls = array ();
        $f = fopen ( $sqlfile, "rb" );
        $create_table = '';
        while ( ! feof ( $f ) ) {
            $line = fgets ( $f );
            if (! preg_match ( '/;/', $line ) || preg_match ( '/ENGINE=/', $line )) {
                $create_table .= $line;
                if (preg_match ( '/ENGINE=/', $create_table)) {
                    $this->_insert_into($create_table);
                    $create_table = '';
                }
                continue;
            }
            $this->_insert_into($line);
        }
        fclose ( $f );
        return true;
    }
    private function _insert_into($sql){
        if (! mysql_query ( trim ( $sql ) )) {
            $this->msg .= mysql_error ();
            return false;
        }
    }
    /*
     * -------------------------------restoring end---------------------------------
     */

    private function close() {
        mysql_close ( $this->db );
    }
    private function lock($tablename, $op = "WRITE") {
        if (mysql_query ( "lock tables " . $tablename . " " . $op ))
            return true;
        else
            return false;
    }
    private function unlock() {
        if (mysql_query ( "unlock tables" ))
            return true;
        else
            return false;
        
    }
    function __destruct() {
        if($this->db){
            mysql_query ( "unlock tables", $this->db );
            mysql_close ( $this->db );
        }
    }
}
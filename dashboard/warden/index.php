<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
    // set group_time
    try
	{
		$sql = 'SELECT * FROM time_info';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}
	
	$results = $result = array();
	while(	$result = $s->fetch() ){	
		$results[] = $result;
	}


    try
	{
		$sql2 = 'SELECT * FROM group_info';
		$s2 = $pdo->prepare($sql2);
		$s2->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}

	$results2 = array();
	while(	$result2 = $s2->fetch() ){	
		$results2[] = array($result2[groupid],"root",$result2[gname]);
		$temp = 0;
		while($temp < $result2[membernumber]){
			$temp = $temp + 1;
			$results2[] = array($temp,$result2[groupid],$temp);
		}
	}



	//include 'wardendelete.php';
	// include 'wardendelete.html.php';

	// set time
	if(isset($_POST['action4']) and $_POST['action4'] == 'Submit')
	{
		if($_POST['s2'] && $_POST['timeid'] && $_POST['s1']){  // timeid=timeid s1=groupid s2=num
		  	$_SESSION["states"] = "Application submitted!!!!" ;
		  	try
			{
				$sql = 'SELECT * FROM group_time WHERE groupid = :groupid AND timeid = :timeid';
				$s = $pdo->prepare($sql);
				$s->bindValue(':groupid',$_POST['s1']);
				$s->bindValue(':timeid',$_POST['timeid']);	
				$s->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}

		  	if($row = $s->fetch() ){
				try
				{

			      	$sql = 'UPDATE group_time SET
			        neednum = :neednum
			        WHERE groupid = :groupid AND timeid = :timeid';
					$s = $pdo->prepare($sql);
					$s->bindValue(':groupid',$_POST['s1']);
					$s->bindValue(':timeid',$_POST['timeid']);	
					$s->bindValue(':neednum',$_POST['s2']);
					$s->execute();


				}
				catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
				}


		  	}else{
				try
				{
					$sql = 'INSERT INTO group_time SET
					groupid = :groupid,
					timeid = :timeid,
					neednum = :neednum';
					$s = $pdo->prepare($sql);
					$s->bindValue(':groupid',$_POST['s1']);
					$s->bindValue(':timeid',$_POST['timeid']);	
					$s->bindValue(':neednum',$_POST['s2']);
					$s->execute();
				}
				catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
				}
			}
		}else{
			if(!$_POST['timeid']) $_SESSION["error1"] = "Please choose time.";
			if(!$_POST['s1']) $_SESSION["error2"] = "Please choose group.";
			if(!$_POST['s2']) $_SESSION["error3"] = "Please choose number.";
		}

	  	header('Location: .');
	  	//echo "<script>alert('修改成功');location.href='.';</script>";
	}

//add staff ///////////////////////////////////////////////////////////////////////////////////////////////////


try
	{
		$sql = 'SELECT userid FROM user_info ORDER BY userid DESC LIMIT 1';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}

	$maxuserid = $s->fetch();

	$maxuserid = $maxuserid[userid];

	// increase userid by 1
	preg_match_all("/\d+/",$maxuserid,$num);
	$num = $num[0][count($num[0])-1];
	$new_num = sprintf("%0".(strlen($num))."d",$num+1);
	$maxuserid = str_replace($num,$new_num,$maxuserid);

	// choose group
    try
	{
		$sql = 'SELECT COUNT(*) AS cnt FROM group_info';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}
	$groupidsum = $s->fetch();

	try
	{
		// $sql = "SELECT groupid FROM group_info ORDER BY groupid '$limit' ";
		$sql = 'SELECT groupid,gname FROM group_info ORDER BY groupid LIMIT 1,?';

		$s = $pdo->prepare($sql);
		$s->bindValue(1,$groupidsum[cnt]-1, PDO::PARAM_INT);
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	$groupids = array();
	while(	$groupid = $s->fetch() ){	
		$groupids[] = $groupid;
	}

	if(isset($_POST['action']) and $_POST['action'] == 'AddStaff')
	{
		
			if($_POST['username'] && $_POST['groupid']){	  	
				$_SESSION["states"] = "Add new staff ". $_POST['username'] ;
	
			  	try
				{
				
					$sql2 = 'SELECT membernumber FROM group_info WHERE groupid = :groupid';  	
			      	$s2 = $pdo->prepare($sql2);
			      	$s2->bindValue(':groupid',$_POST['groupid']);
			      	$s2->execute();
	
				}
				catch (PDOException $e){
					$error = 'Error select.';
					header("Location: /includes/error.html.php");
					exit(); 
				}
				$numofstaff=$s2->fetch();
	
			  	try
				{
					$sql2 = 'INSERT INTO user_info SET
						userid = :userid,
						username = :username,
						userpwd = :userpwd,
						position = :position,
						typeid = :typeid,
						groupid = :groupid';  	
			      	$s2 = $pdo->prepare($sql2);
			      	$s2->bindValue(':userid',$maxuserid);
			      	$s2->bindValue(':username',$_POST['username']);
			      	$s2->bindValue(':userpwd','123456');
			      	if($numofstaff[membernumber] == 0 ){
						$s2->bindValue(':position','leader');
			      		$s2->bindValue(':typeid','3');
			      		echo "firsttime 0";
			      	}else{
			      		$s2->bindValue(':position','staff');
			      		$s2->bindValue(':typeid','4');
			      		echo "firsttime not 0";
			      	}
			      	$s2->bindValue(':groupid',$_POST['groupid']);
			      	$s2->execute();
	
				}
				catch (PDOException $e){
					$error = 'Error select.';
					header("Location: /includes/error.html.php");
					exit(); 
				}
				if($numofstaff[membernumber] == 0 ){
					try
					{
				
				    	$sql = 'UPDATE group_info SET leaderid = :leaderid WHERE groupid = :groupid';
				      	$s = $pdo->prepare($sql);
				      	$s->bindValue(':leaderid',$maxuserid);
				      	$s->bindValue(':groupid',$_POST['groupid']);   
				      	$s->execute();	
	
					}
					catch (PDOException $e){
						echo $e;
						exit(); 
					}
				}
			}else{
				// error, empty input
				if(!$_POST['username'])	$_SESSION["error1"] = "Please input username!";
				if(!$_POST['groupid'])	$_SESSION["error2"] = "Please choose a group!";
			}
	  	header('Location: .');
	}
// add group
	try
	{
		$sql = 'SELECT groupid FROM group_info ORDER BY groupid DESC LIMIT 1';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}

	$maxgroupid = $s->fetch();	// this is the max groupid right now, we should create this+1 

	if(isset($_POST['action']) and $_POST['action'] == 'Creategroup')
	{

	  	$_SESSION["states"] = "Create new group ". $_POST['groupname'] ;

	  	try
		{

			$sql2 = 'INSERT INTO group_info SET
				groupid = :groupid,
				gname = :gname,
				leaderid = :leaderid,
				membernumber = :membernumber';  	
	      	$s2 = $pdo->prepare($sql2);
	      	$s2->bindValue(':groupid',$maxgroupid[groupid]+1);
	      	$s2->bindValue(':gname',$_POST['groupname']);
	      	$s2->bindValue(':leaderid','C00000000');
	      	$s2->bindValue(':membernumber','0');
	      	$s2->execute();

		}
		catch (PDOException $e){
			$error = 'Error select.';
			header("Location: /includes/error.html.php");
			exit(); 
		}

	  	header('Location: .');
	}


//arrange staff to other group
	 try
	{
		$sql = 'SELECT COUNT(*) AS cnt FROM group_info';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}
	$groupidsum = $s->fetch();

	try
	{
		$sql = 'SELECT groupid,gname FROM group_info ORDER BY groupid LIMIT 1,?';

		$s = $pdo->prepare($sql);
		$s->bindValue(1,$groupidsum[cnt]-1, PDO::PARAM_INT);
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	$assignstaffs = array();
	while(	$originalgroupid = $s->fetch() ){	
		$assignstaffs[] = array($originalgroupid[groupid],"root","Group ".$originalgroupid[groupid].": ".$originalgroupid[gname]);
	}

	// select a staff
	try
	{
		$sql = 'SELECT groupid,username,userid FROM user_info WHERE position = :postion AND groupid > 0 ORDER BY groupid,userid ';
		$s = $pdo->prepare($sql);
		$s->bindValue(':postion',"staff");
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	while(	$targetstaff = $s->fetch() ){	
		$assignstaffs[] = array($targetstaff[userid],$targetstaff[groupid],$targetstaff[username]);
	}

	// select another group
	try
	{
		$sql = 'SELECT g1.groupid AS gid1, g2.groupid AS gid2, g2.gname FROM `group_info` AS g1 JOIN  `group_info` AS g2 
				WHERE g1.groupid <> g2.groupid AND g1.groupid >0 AND g2.groupid >0';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	$assignstaffs2 = array();
	while(	$targetgroupid = $s->fetch() ){	
		$assignstaffs2[] = array($targetgroupid[gid2],$targetgroupid[gid1],"Group ".$targetgroupid[gid2].": ".$targetgroupid[gname]);
	}


	if(isset($_POST['action']) and $_POST['action'] == 'Assign')
	{

		// echo $_POST['a1']; 	// original groupid
		// echo $_POST['a2']; 	// userid
		// echo $_POST['a3']; 	// new groupid
		
		// check input 

		if($_POST['a1'] && $_POST['a2'] && $_POST['a3'])
		{		
			try  		// get original group name 
			{

				$sql2 = 'SELECT gname FROM group_info WHERE groupid = :groupid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':groupid',$_POST['a1']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$originalgroupname = $s2->fetch(); 
	  		// get user name 
			try
			{

				$sql2 = 'SELECT username FROM user_info WHERE userid = :userid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':userid',$_POST['a2']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$username = $s2->fetch(); 		
	 		// get new group name 
			try
			{
				$sql2 = 'SELECT gname FROM group_info WHERE groupid = :groupid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':groupid',$_POST['a3']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$newgroupname = $s2->fetch(); 

		  	$_SESSION["states"] = "Assign staff ". $username[username]." from group ". $originalgroupname[gname]." to group ". $newgroupname[gname];
		  	
		  	// SELECT * FROM `time_info` WHERE timedate > current_date()
		  	// SELECT * FROM `time_info` WHERE timedate > curdate()


		  	// first delete all future work time  1. increase the group_time requestvalue 2. delete all work_info with userid future work_time
		  	try
			{

				$sql2 = 'UPDATE group_time, ( SELECT work_info.timeid FROM time_info INNER JOIN work_info ON work_info.timeid = time_info.timeid 
						WHERE timedate > curdate() AND work_info.userid = :userid ) AS timetable SET requestvalue = requestvalue + 1 
						WHERE group_time.timeid = timetable.timeid AND group_time.groupid = :groupid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':groupid',$_POST['a1']);	// original group
		      	$s2->bindValue(':userid',$_POST['a2']);
		      	$s2->execute();

			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}

		  	try
			{

				$sql2 = 'DELETE work_info FROM work_info INNER JOIN ( SELECT work_info.timeid AS tid FROM time_info INNER JOIN work_info ON 
						work_info.timeid = time_info.timeid WHERE timedate > curdate() AND work_info.userid = :userid ) AS timetable ON 
						work_info.timeid = timetable.tid WHERE work_info.userid = :userid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':userid',$_POST['a2']);
		      	$s2->execute();

			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}

			// move this staff to new group 1.update group_info in ori and new about membernumber  2. update user_info about groupid
		 //  	try
			// {

			// 	$sql2 = 'UPDATE group_info SET membernumber = membernumber - 1 WHERE groupid = :groupid';  	
		 //      	$s2 = $pdo->prepare($sql2);
		 //      	$s2->bindValue(':groupid',$_POST['a1']);	// original group
		 //      	$s2->execute();

			// }
			// catch (PDOException $e){
			// 	$error = 'Error select.';
			// 	header("Location: /includes/error.html.php");
			// 	exit(); 
			// }
		 //  	try
			// {

			// 	$sql2 = 'UPDATE group_info SET membernumber = membernumber + 1 WHERE groupid = :groupid';  	
		 //      	$s2 = $pdo->prepare($sql2);
		 //      	$s2->bindValue(':groupid',$_POST['a3']);	// new group
		 //      	$s2->execute();

			// }
			// catch (PDOException $e){
			// 	$error = 'Error select.';
			// 	header("Location: /includes/error.html.php");
			// 	exit(); 
			// }
		  	try
			{

				$sql2 = 'UPDATE user_info SET groupid = :groupid WHERE userid = :userid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':userid',$_POST['a2']);		// userid
		      	$s2->bindValue(':groupid',$_POST['a3']);	// new group
		      	$s2->execute();

			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}

		}else{
			//error, some input is empty
			if(!$_POST['a1'])	$_SESSION["error1"] = "This field can't be empty!";
			if(!$_POST['a2'])	$_SESSION["error2"] = "This field can't be empty!";
			if(!$_POST['a2'])	$_SESSION["error3"] = "This field can't be empty!";
		}

	  	header('Location: .');
	}


//switch leader

    try
	{
		$sql = 'SELECT COUNT(*) AS cnt FROM group_info';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		$error = 'Error select.';
		header("Location: /includes/error.html.php");
		exit(); 
	}
	$groupidsum = $s->fetch();

	try
	{
		$sql = 'SELECT groupid,gname FROM group_info ORDER BY groupid LIMIT 1,?';

		$s = $pdo->prepare($sql);
		$s->bindValue(1,$groupidsum[cnt]-1, PDO::PARAM_INT);
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	$switchleaders = array();
	while(	$switchgroupid = $s->fetch() ){	
		$switchleaders[] = array($switchgroupid[groupid],"root","Group ".$switchgroupid[groupid].": ".$switchgroupid[gname]);
	}

	// select leader
	try
	{
		$sql = 'SELECT group_info.groupid,leaderid,username FROM group_info INNER JOIN user_info ON user_info.userid = group_info.leaderid 
				ORDER BY group_info.groupid ';

		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	while(	$eachleader = $s->fetch() ){	
		//$switchleaders[] = array("",$eachleader[groupid],"Please select leader");
		$switchleaders[] = array($eachleader[leaderid],$eachleader[groupid],$eachleader[username]);
		//$switchleaders[] = array("",$eachleader[leaderid],"Please select new leader");
	}

	// select staff (new leader)
	try
	{
		$sql = 'SELECT groupid,username,userid FROM user_info WHERE position = :postion ORDER BY groupid ';

		$s = $pdo->prepare($sql);
		$s->bindValue(':postion',"staff");
		$s->execute();
	}
	catch (PDOException $e){
		echo $e;
		exit(); 
	}
	$newleaders = array();
	while(	$eachstaff = $s->fetch() ){	
		$newleaders[] = array($eachstaff[userid],$eachstaff[groupid],$eachstaff[username]);
	}



	if(isset($_POST['action']) and $_POST['action'] == 'SwitchLeader')
	{
		//	x1 groupid  x2 leaderid  x3 newleaderid
		if($_POST['x1']&&$_POST['x2']&&$_POST['x3']){	

			try  		// get group name 
			{

				$sql2 = 'SELECT gname FROM group_info WHERE groupid = :groupid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':groupid',$_POST['x1']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$groupname = $s2->fetch(); 
	  		// get oldleader name 
			try
			{

				$sql2 = 'SELECT username FROM user_info WHERE userid = :userid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':userid',$_POST['x2']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$oldleadername = $s2->fetch(); 	
	  		// get newleader name 
			try
			{

				$sql2 = 'SELECT username FROM user_info WHERE userid = :userid';  	
		      	$s2 = $pdo->prepare($sql2);
		      	$s2->bindValue(':userid',$_POST['x3']);
		      	$s2->execute();
			}
			catch (PDOException $e){
				$error = 'Error select.';
				header("Location: /includes/error.html.php");
				exit(); 
			}		
			$newleadername = $s2->fetch(); 	

			$_SESSION["states"] = "Change leader of group ".$groupname." from ".$oldleadername." to ".$newleadername;
			
			//	update group_info
			try
			{
		
		    	$sql = 'UPDATE group_info SET leaderid = :leaderid WHERE groupid = :groupid';
		      	$s = $pdo->prepare($sql);
		      	$s->bindValue(':leaderid',$_POST['x3']);
		      	$s->bindValue(':groupid',$_POST['x1']);   
		      	$s->execute();	

			}
			catch (PDOException $e){
				echo $e;
				exit(); 
			}
			
		  	//	update user_info for original leader
			try
			{
		
		    	$sql = 'UPDATE user_info SET position = :position, typeid = :typeid WHERE userid = :userid';
		      	$s = $pdo->prepare($sql);
		      	$s->bindValue(':position',"staff");
		      	$s->bindValue(':typeid',"4");  
		      	$s->bindValue(':userid',$_POST['x2']);  
		      	$s->execute();	

			}
			catch (PDOException $e){
				echo $e;
				exit(); 
			}
			
			//	update user_info for new leader
			try
			{
		
		    	$sql = 'UPDATE user_info SET position = :position, typeid = :typeid WHERE userid = :userid';
		      	$s = $pdo->prepare($sql);
		      	$s->bindValue(':position',"leader");
		      	$s->bindValue(':typeid',"3");  
		      	$s->bindValue(':userid',$_POST['x3']);  
		      	$s->execute();	

			}
			catch (PDOException $e){
				echo $e;
				exit(); 
			}
		}else{
			//error empty input
			if(!$_POST['x1']) $_SESSION["error1"] = "Please choose a group!";
			if(!$_POST['x2']) $_SESSION["error2"] = "Please choose the leader!";
			if(!$_POST['x3']) $_SESSION["error3"] = "Please choose a new leader!";
		}

	  	header('Location: .');
	}

	include 'wardensettime.html.php';

?>
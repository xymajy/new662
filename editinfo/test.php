<?php
  $target_dir =  "./uploads";
  echo "222";
  if(searchFile($target_dir, "C00000001")){
    echo "111";
  }else {
    echo "000";
  }

function searchFile($dir, $keyword) {
  $sFile = getFile($dir);
  if (count($sFile) <= 0) {
    return false;
  }
  foreach ($sFile as $file) {
    if(strstr($file, $keyword) !== false ){
      $sResult = $file;
    }
  }
  if (count($sResult) <= 0) {
    return false;
  } else {
    return $sResult;
  }

}

function getFile($dir){
  $dp = opendir($dir);
  $fileArr = array();
  while (!false == $curFile = readdir($dp)) {
    if ($curFile!="." && $curFile!=".." && $curFile!="") {
      if (is_dir($curFile)) {
        $fileArr = getFile($dir."/".$curFile);
      } else {
        $fileArr[] = $dir."/".$curFile;
      }
    }
  }
  return $fileArr;
}

?>
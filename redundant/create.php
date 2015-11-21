<?php

include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';

$a = "yyyy";
$b = 26;
$sql = 'INSERT INTO info SET name = :name, age = :age';
$s = $pdo->prepare($sql);
$s->bindValue(':name', $a);
$s->bindValue(':age', $b);
//$mj= "mjy";
//$ab= 24;
//$s = $pdo->prepare("insert into 'info' (name,age) values(?,?)");
//$s->bindValue(':name',$mj,PDO::PARAM_STR);
//$s->bindValue(':age',$ab,PDO::PARAM_INT);
//if($pdo->query($sql)){
if($s->execute()){
echo "suc";
}else{
echo "err";
}
?>

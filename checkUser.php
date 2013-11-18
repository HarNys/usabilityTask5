<?php
require_once('DBhandler.php');
$db = new DBhandler();
session_start();


$userName=$_POST['userName'];

$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $db->db->prepare($sql);
$stmt -> execute(array(':name'=>$userName);

if(mysql_num_rows($stmt)>0)
{
	$row = $question->fetch();
	if($row['password']==$_POST['password'])
	{
		$_SESSION['user']=($row['id'];
	}
}

?>
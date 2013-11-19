<?php
require_once('DBhandler.php');
$db = new DBhandler();
session_start();

$userName=$_POST['username'];

$sql = "SELECT * FROM users WHERE name = :name";
$stmt = $db->db->prepare($sql);
$stmt -> execute(array(':name'=>$userName));

$numRows = $stmt->rowCount();

if($numRows > 0)
{
	$row = $stmt->fetch();
	if($row['password'] == $_POST['password'])
	{
		$_SESSION['user']=$row['id'];
		header("Location: index.php");
	}
}
else

?>
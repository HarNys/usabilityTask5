<?php
require_once('DBhandler.php');
$db = new DBhandler();
session_start();
$user = $_SESSION['user'];



$id = $_POST['ID'];

if (isset($_SESSION['user']))
{

	if($_POST['type']=='A')
	{
		echo $id;
		$db->addLikeAnswers($id);
	}

	else if($_POST['type']=='Q')
	{
		echo $id;
		$db->addLikeQuestion($id);
	}
}
header("index.php");


?>
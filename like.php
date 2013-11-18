<?php
require_once('DBhandler.php');
$db = new DBhandler();
session_start();
$user=$_SESSION['user'];

$id=$_POST['id']

if (isset($_SESSION['user']))
{
	if($_POST['type']=="A")
	{
		$db->addLikeAnswers($id);
	}

	else if($_POST['type']=="Q")
	{
		$db->addLikeQuestion($id);
	}
}


?>
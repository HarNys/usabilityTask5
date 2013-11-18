<?php
require_once('DBhandler.php');
$db = new DBhandler();
session_start();


$id = $_POST['ID'];

if (isset($_SESSION['user']))
{
	$user = $_SESSION['user'];

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
else
{
	echo "You must be logged in to upvote!";
}

header("index.php");


?>
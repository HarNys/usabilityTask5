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
		$db->addLikeAnswers($id);
		$questionID=$_POST['qID'];
	}

	else if($_POST['type']=='Q')
	{
		$db->addLikeQuestion($id);
		$questionID = $id;
	}
}

header("Location: questions.php?id=" . $questionID);


?>
<?php

require_once('DBhandler.php');
$db = new DBhandler();
session_start();
$user=$_SESSION['user'];

$questionID = $_POST['questionID'];
$content = $_POST['answers'];

if (isset($_SESSION['user']))
{
	$db->addAnswers($user, $questionID, $content);
}

header("Location: questions.php?id=" . $questionID);

?>
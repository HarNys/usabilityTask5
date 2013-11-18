<?php

require_once('DBhandler.php');
$db = new DBhandler();
session_start();
$user=$_SESSION['user'];

$title = $_POST['title'];
$content = $_POST['content'];

if (isset($_SESSION['user']))
{
	//$db->newQuestion($user, $title, $content);
}
else
echo "You are not logged in";

?>

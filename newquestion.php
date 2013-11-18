<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	require_once('DBhandler.php');
	$db = new DBhandler();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fronter</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="head">
<h1>Fronter</h1>
</div>

<div id="content">
	<h2>Write an question:</h2>
	<form method="post" action="">
		Question: <input type="text"  name="title" ><br />
		Description:<textarea name="content" cols="25" rows="5"></textarea><br />
		<input type="button" value="Submit Question">
	</form>
</div>

</body>

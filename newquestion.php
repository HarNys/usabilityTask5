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
	<div id="headContent">
		<div align="Left">
			<h1><a href="index.php"> >> Fronter</a></h1>
			<?php
				if(isset($_SESSION['user']))
				{
					// Display Signed in as: Name. ?
				}
				else
				{
					// Display log in form. 
				}
			?>
		</div>
	</div>
</div>

<div id="content">
	<h2>Ask a new question</h2>
	<form method="post" action="postQuestion.php">
		<input type="text" placeholder="Insert title here..." name="title" ><br />
		<textarea name="content" cols="25" rows="5">Insert Content / Question Description here...</textarea><br />
		<input type="submit" value="Submit Question">
	</form>
</div>

</body>

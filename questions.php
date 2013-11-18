<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	require_once('DBhandler.php');
	$db = new DBhandler();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Fronter</title>
<meta http-equiv="Content-Type" content="text/html; " />
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="head">
<h1>Fronter</h1>
</div>

<div id="content">

	<?php
	$id = $_GET['id'];
		$question = $db->getQuestion($id);
		
		while($row = $question->fetch())
		{
			echo "<h3>". $row['title']. "</h3><br />". $row['content']. "<p /> " . " 
				<font color='green' size='2'> Number of likes: ". $row['numOfLikes']. "</font>";
			echo "<form method='post' action='like.php'>
					<input type='hidden' value='". $_GET['id']."' name='ID' >
					<input type='hidden' value='Q' name='type' >
					<input type='submit' value='Like!'>
				</form>";
		}
		echo "<p />"
	?>
	
	<h2>Answers:</h2>
	
	<?php
		$id = $_GET['id'];
		$question = $db->getAnswers($id);
		
		while($row = $question->fetch())
		{
			echo "<font color='green'><b>".$row['numOfLikes']."</font></b> ". $row['content']. "<br /> ";
			echo "<form method='post' action='like.php'>
					<input type='hidden' value='". $row['id']."' name='ID' >
					<input type='hidden' value='A' name='type' >
					<input type='submit' value='Like!'>
				</form>";
		}
		echo "<p />";
	?>
	<h2>Write an answers:</h2>
	<form method="post" action="postAnswer.php">
		<input type="hidden" value="<?php echo $_GET['id']; ?>" name="questionID" >
		<textarea name="answers" cols="25" rows="5"></textarea><br />
		<input type="submit" value="Submit Answers">
	</form>

</div>

</body>
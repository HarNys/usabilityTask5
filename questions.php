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

	<?php
	$id = $_GET['id'];
		$question = $db->getQuestion($id);
		
		while($row = $question->fetch())
		{
			$author = $db -> getUsername($row['userID']);
			$author = $author -> fetch();

			echo "<h3>" . $row['title'] . "</h3>" . 
			     "<p class='derp'>Posted by: " . $author['name'] . " at " .  
				 $row['dateTime'] . "</p><br /> " . 
				 $row['content'] . "<p /> ";
			
			echo "<form method='post' action='like.php'>
					<input type='hidden' value='". $_GET['id']."' name='ID' >
					<input type='hidden' value='Q' name='type' >
					<input type='image' src='upvote.png'>
				</form>";
			echo "<font color='green' size='4'><b>". $row['numOfLikes'] . "</b></font>";
		}
		echo "<p />"
	?>
	
	<h2>Answers:</h2>
	
	<?php
		$id = $_GET['id'];
		$question = $db->getAnswers($id);
		
		while($row = $question->fetch())
		{
			
			echo "<form method='post' action='like.php'>
					<input type='hidden' value='". $row['id']."' name='ID' >
					<input type='hidden' value='A' name='type' >
					<input type='image' src='upvote.png'>
				</form>";
			echo "<font color='green'><b>".$row['numOfLikes']."</font></b> ". $row['content']. "<br /> ";
		}
		echo "<p />";
	?>
	<h2>Submit your own answer:</h2>
	<form method="post" action="postAnswer.php">
		<input type="hidden" value="<?php echo $_GET['id']; ?>" name="questionID" >
		<textarea name="answers" cols="25" rows="5"></textarea><br />
		<input type="submit" value="Submit Answers">
	</form>

</div>

</body>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	require_once('DBhandler.php');
	$db = new DBhandler();
	session_start();
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
		<div align="Left" class="title ">
			<h1><a href="index.php"> >> Fronter</a></h1>
		</div>
			<div class="test">
			<?php
				if(isset($_SESSION['user']))
				{	
					$username = $db -> getUsername($_SESSION['user']);
					$username = $username -> fetch();

					echo "<p>Logged in as " . $username['name'] . ". <a href='logout.php'>Logout</a> .</p>";
				}
				else
				{
					echo"<form method='post' action='checkUser.php'>
						<label>Username: <input type='text' name='username'></label>
						<label>Password: <input type='password' name='password'></label>
						<input type='submit' value='Log in'>
						</form>";
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

			echo "<h2>" . $row['title'] . "</h2>" . 
			     "<p class='derp'>Posted by: " . $author['name'] . " at ";

			echo $row['dateTime'] . ".</p><br /> ";


			     			// insert like button / form. 
			echo "<form method='post' action='like.php'>
					<input type='hidden' value='". $_GET['id']."' name='ID' >
					<input type='hidden' value='Q' name='type' >
					<input type='image' src='upvote.png'>
				</form>";
			echo "<font color='green' size='4'><b class='like'>". $row['numOfLikes'] . "</b></font>";

			echo $row['content'] . "<p /> <HR WIDTH='99%' color='#13385D' SIZE='3'><br />";
			

		}
		echo "<p />"
	?>
	
	<h2>Answers:</h2>
	
	<?php
		

		if ($db->getNumberOfAnswers($_GET['id']))
		{
			$id = $_GET['id'];
			$answers = $db->getAnswers($id);

			while($row = $answers->fetch())
			{
				$author = $db -> getUsername($row['userId']);
				$author = $author -> fetch();
				
				// insert like button / form. 
				echo "<form method='post' action='like.php'>
						<input type='hidden' value='". $row['id']."' name='ID' >
						<input type='hidden' value='A' name='type' >
						<input type='hidden' value='" . $id . "' name='qID' >
						<input type='image' src='upvote.png'>
					</form>";


				echo "<font color='green'><b class='like'>".$row['numOfLikes']."</font></b> ". $row['content'] .
				     "<em>Answer by " . $author['name'] . " at " . $row['timeStamp'] .  ".</em>" . 
				     "<HR WIDTH='90%' color='#13385D' SIZE='1'><br /> ";
			}


		}
		else
		{
			echo "No answers yet! <HR WIDTH='90%' color='#13385D' SIZE='1'><br />" ;
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
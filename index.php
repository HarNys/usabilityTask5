<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php
	require_once('DBhandler.php');
	$db = new DBhandler();
	session_start();
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
		</div>
			<span class="test">
			<?php
				if(isset($_SESSION['user']))
				{	
					$username = $db -> getUsername($_SESSION['user']);
					$username = $username -> fetch();

					echo "<p>Logged in as " . $username['name'] . ". <a href='logout.php'>Logout</a>.</p>";
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
		</span>
	</div>
</div>

<div id="content">
	
	<h1>Questions and answers</h1>
	<a class="derp" href="newquestion.php">Ask a Question<a/>

	<ul>
	<?php
		$questions = $db->getAllQuestions();
		
		while($row = $questions->fetch())
		{
			echo "<li><b>" . $row['numOfLikes'].": </b> <a href='questions.php?id=".$row['id']."'>". $row['title'] . "</a></li>";
		}
	?>
	</ul>
</div>

</body>

<?php

class DBhandler
{
	var $db;
	
	//Establis conection to database
	function __construct() 
	{
		$this->db = new PDO("mysql:host=localhost;dbname=usability","usability", "BcACbbJYVUFHtzwf") or die("Database connection problems");
	}

	function getAllQuestions()
	{
		$sql = "SELECT title, numOfLikes, id 
				FROM questions ORDER BY dateTime DESC";
		
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt;
	}

	// Get the name of a specific user
	// @param the id of the user wanted
	// @return the result of the database query. (Username if found) 
	function getUsername($id)
	{
		$sql = "SELECT name FROM users WHERE id=$id";
		$stmt = $this -> db -> prepare ($sql);
		$stmt -> execute();

		return $stmt;
	}

	// Get one specific question
	// @param the id of the question wanted
	// @return the result of the SQL statement. (The question if found)
	function getQuestion($id)
	{
		$sql = "SELECT * 
				FROM questions 
				WHERE id=$id";
		
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute();
		return $stmt;
	}
	
	//Get all answers for one question
	function getAnswers($id)
	{
		$sql = "SELECT * 
				FROM comments 
				WHERE questionId=$id ORDER BY numOfLikes DESC";
		
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute();
		return $stmt;
	}
	
	function addAnswers($userId, $questionId, $content)
	{
		$sql="INSERT INTO comments(userId,questionId,content) VALUES(:user,:question,:content)";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':user'=>$userId, ':question'=>$questionId, ':content'=>$content));
	}
	
	function newQuestion ($userID, $title, $content)
	{
		$sql="INSERT INTO questions(userID, title, content) VALUES(:user,:question,:content)";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':user'=>$userID, ':question'=>$title, ':content'=>$content));
	}
	
	function addLikeQuestion($id)
	{
		$sql="UPDATE questions SET numOfLikes=numOfLikes+1 WHERE id = :id";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':id'=>$id));
	}
	
	function addLikeAnswers($id)
	{
		$sql="UPDATE comments SET numOfLikes=numOfLikes+1 WHERE id = :id";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':id'=>$id));
	}

	function getNumberOfAnswers($qID)
	{
		$sql = "SELECT count(id) AS numAnswers 
				FROM  comments 
				WHERE questionId LIKE :qid";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':qid'=>$qID));
		$value = $stmt->fetch();
		return $value['numAnswers'];
	}

	function lastAnswer($qID)
	{
		$sql = "SELECT TIMESTAMP, users.name
				FROM comments
				JOIN users ON users.id = userId
				WHERE questionId LIKE :qid 
				ORDER BY TIMESTAMP DESC 
				LIMIT 1";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute(array(':qid'=>$qID));
		$value = $stmt->fetch();
		return $value;
	}
}

?>
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
				FROM questions";
		
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
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
	
	//Get all answers for on question
	function getAnswers($id)
	{
		$sql = "SELECT * 
				FROM comments 
				WHERE questionId=$id";
		
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
	
}

?>
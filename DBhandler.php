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
		/*$sql = "SELECT questions, numOfLikes FROM questions";
		$stmt = $this->db->prepare($sql);
		$stmt->execute();
		return $stmt;*/
	}

	// Get one specific question
	// @param the id of the question wanted
	// @return the result of the SQL statement. (The question if found)
	function getQuestion($id)
	{
		$sql = "SELECT * FROM questions WHERE id=$id";
		$stmt = $this -> db -> prepare($sql);
		$stmt -> execute();
		return $stmt;
	}
}

?>
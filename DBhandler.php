<?php

class DBhandler
{
	var $db;
	
	//Establis conection to database
	function __construct() 
	{
		$this->db = new PDO("mysql:host=localhost;dbname=usability","usability", "BcACbbJYVUFHtzwf") or die("connection problems");
	}


	function getAllQuestions()
	{


	}

	function getQuestions()
	{

	
	}


?>
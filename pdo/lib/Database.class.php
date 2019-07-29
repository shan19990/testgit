<?php

/**
 *  
 */
class Database 
{

	public $conn;
	
	function __construct()
	{
		try{

		    $this->conn = new pdo( 'mysql:host=localhost;dbname=ecart',
		                    'root',
		                    'password',
		                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch(PDOException $ex){
		    throw new Exception("Error Processing Request ".$ex->getMessage(), 1);
		    
		}
	}
}

class UserInput extends Database
{	

	public function __construct()
	{
		parent::__construct();
	}
	
	public function insert($first,$last,$email,$password){
		try {
			$query = "INSERT INTO user_details (first_name, last_name, email, password) VALUES('$first', '$last', '$email', '$password')";
			$this->conn->query($query);
		} 
		catch (PDOException $e) {
			echo "Error : " . $e->getMessage() . "<br/>";
		}
	}

	public function checkUnique($index , $name , $param){
		//$this->errorMsg[$index] = '';
		try{
		$query = "SELECT * FROM user_details WHERE email = '$param' LIMIT 0,1";
		$stmt = $this->conn->query($query);
		$row=mysqli_fetch_assoc($this->conn);
			}
		catch(PDOException $ex){
			throw new Exception("Error Processing Request ".$ex->getMessage(), 1);
		    
		}
		if ($row !== -1){
			return false;
		}

		return true;
	}

	public function checkEmailAndPassword($index , $name , $email , $password){
		//$this->errorMsg[$index] = '';
		try{
			$query = "SELECT * FROM user_details WHERE email = '$email' AND password = '$password' LIMIT 0,1";
			$stmt = $this->conn->query($query);
			$row = $stmt->fetch();
			if ($row === false){
				return false;
			}

			return $row;
			}
		catch(PDOException $ex){
			throw new Exception("Error Processing Request ".$ex->getMessage(), 1);
		    
		}
		
	}
}

<?php

/**
 *  
 */
class Validator 
{
	
	public $user;
	public $isValid = true;
	public $errorMsg = [];

	public function __construct()
	{
		$this->user = new UserInput;
	}

	public function checkNotEmpty( $index , $name , $param){
		if( empty($param) ){
			$this->isValid = false;
			$this->errorMsg[$index] = 'Error: ' .$name. ' Should not be empty';
		}
	}

	public function checkEmail($index , $name , $param){
		$is_valid_email = filter_var($param, FILTER_VALIDATE_EMAIL);
		if (!$is_valid_email) {
			$this->errorMsg[$index] = 'Error: ' .$name. ' is not a proper email';
			$this->isValid = false;
		}
	}

	public function checkUnique($index , $name , $param){
		$row = $this->db->checkUnique($index , $name , $param);
		if ($row === false){
			$this->errorMsg[$index] = 'Error: ' .$name. ' is already registered';
			$this->isValid = false;
		}
	}

	public function checkEmailAndPassword($index , $name , $email , $password){
		$row = $this->user->checkEmailAndPassword($index , $name , trim($email) , $password);
		if ($row === false){
			$this->errorMsg[$index] = 'Email and Password is not valied';
			$this->isValid = false;
		}

		return $row;
	}




	public function getIsValid(){
		return $this->isValid;
	}

	public function getError(){
		return $this->errorMsg;
	}
}
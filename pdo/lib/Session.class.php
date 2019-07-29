<?php

/**
 *  
 */
class Session 
{
	function __construct()
	{
		session_start();
	}


	public function __set($name, $value){
		$_SESSION[$name] = $value;
	}

	public function __get($name) {
		if(isset($_SESSION[$name])) { 
			return $_SESSION[$name];
		} else {
			throw new Exception("Error : ".$name. ' is not found in session', 1);
		}
    }
    
}
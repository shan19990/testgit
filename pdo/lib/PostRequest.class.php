<?php

/**
 * 
 */
class PostRequest
{
	function __construct()
	{
		foreach($_POST as $key => $value){
			$this->{$key} = $value;
		}
	}


	function __set($name, $value){
		$this->{$name} = $value;
	}

	public function __get($name) {
		throw new Exception("Error : ".$name. ' is not found in post request', 1);
    }
}
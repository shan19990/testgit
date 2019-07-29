<?php

/**
 *  
 */
class Template 
{
	
	function __construct()
	{
		# code...
	}


	public static function formOpen($method = 'POST', $action = ''){
		return '<form method="'.$method.'" action="'.$action.'">';
	}

	public static function input($name = '', $type = 'text'){
		return '<input type="'.$type .'" name="'.$name.'">';
	}

	public static function formClose(){
		return '</form>';
	}
}
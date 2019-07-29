<?php

$toBeIncluded = [
	'Database',
	'Session',
	'Template',
	'Validator',
	'PostRequest'
];


foreach ($toBeIncluded as $key => $eachClass) {
	include_once($eachClass.'.class.php');
	${$eachClass} = new $eachClass();
}
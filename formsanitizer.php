<?php

class formsanitizer{
public static function sanitizeStr($text){
	$text = strip_tags($text);
	$text = trim($text);
	$text = strtolower($text);
	$text = ucfirst($text);
	return $text;
}

public static function sanitizeUserName($text){
	$text = strip_tags($text);
	$text = trim($text);
	return $text;
}
public static function sanitizePassword($text){
	$text = strip_tags($text);
	return $text;
}
public static function sanitizeEmail($text){
	$text = strip_tags($text);
	$text = trim($text);
	return $text;
}
}

?>
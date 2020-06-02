<?php

/**
 * 
 */

class Helper
{
	
	function __construct()
	{
		# code...
	}

	function sanitizeString($var)
		{
		    $var = stripslashes($var);
		    $var = strip_tags($var);
		    $var = htmlentities($var);
		    return $var;
		}

	function sanitizeArray($data)
		{
			foreach ($data as $key => $value) {
				$data[$key] = $this->sanitizeString($value);
			}
		    return $data;
		}

	public function error(bool $value = false)
	{
		$path = htmlentities($_SERVER['QUERY_STRING']);
		$_SESSION['error']['path'] = $path;
		
		if(!$value){
			return;
		} else{
			header("Location:/ui/error");
			exit;		
		}
	
	}
	function sanitizeMySQL($connection, $var)
		{
		    $var = $connection->real_escape_string($var);
		    $var = sanitizeString($var);
		    return $var;
		}

	public function saveImageToPath($image, $path)
	{	//var_dump($path);exit;
		if($image){
		//$image = imagecreatefromstring($image);
	//var_dump($image);exit;		
	//$user = posix_getpwuid(posix_geteuid())['name'];	
//print_r($image);
	
	$file = fopen($path,"w") or die("no file");
	
	fwrite($file, $image);
	fclose($file);
//$image = imagejpeg($image, "./tmp/newhello.jpeg", 100);
//		var_dump($image);exit;
		if($image) return true;
		else 	   return false;			
		} else 
		return false;

	}

	public function makeThumb($image, $path)
	{
		if($image){

		$image = imagecreatefromstring($image);
		$image = imagejpeg($image, $path, 20);
		if($image) return true;
		else 	   return false;	
		} else
		return false;

	}

	public function encodeText(String $text):String
	{
		$text = strtolower($text);
		$text = preg_replace('/\s+/', '_', $text);
		return $text;
	}
}

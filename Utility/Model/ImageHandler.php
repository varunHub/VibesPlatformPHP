<?php namespace platform\Utility;

class ImageHandler
{

// File and new size
function GrapImageFilefromWEB($filename,$toFile)
{
	$percent = 0.5;
	$fwidth = 480;
	
	list($width, $height) = getimagesize($filename);
	$newwidth = $fwidth; //$width; //$width * $percent;
	$newheight = ($height/$width) * $newwidth; // * $percent;

	// Load
	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefromjpeg($filename);

	// Resize
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	// Output
	$toFile = trim($toFile);
	
	$Suggested = $toFile;

	imagejpeg($thumb,$Suggested);
	return $Suggested;
}


}
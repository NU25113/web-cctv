<?php
function imageResize($imageResourceId, $width, $height)
{
	$targetWidth = $width < 1280 ? $width : 1280;
	$targetHeight = ($height / $width) * $targetWidth;
	$targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
	imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);
	return $targetLayer;
}

?>



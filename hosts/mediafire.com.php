<?php
header("content-type:application/json");
function check_mediafire_com($Url){ 
	 $data =file_get_contents($Url);
	preg_match("/<div class=\"filename\">(.*?)<\/div>/", $data, $dosyaCek);                   
preg_match("/<li>File size:(.*?)<span>(.*?)<\//", $data, $boyut);
	if(!empty($boyut[2])){
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=$boyut[2];
$jsonveri["filename"]=trim($dosyaCek[1]);
$jsonveri["link"]=$Url;
	}else{
	$jsonveri["status"]="";		
$jsonveri["link"]=$Url;
	}
			  return json_encode($jsonveri);
}
echo check_mediafire_com($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * MediaFire.com LinkChecker Plugin
 * Date: 24.04.2022
 */

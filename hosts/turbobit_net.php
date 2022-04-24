<?php
header("content-type:application/json");
function check_turbobit_net($Url){	
 $data = curl($Url,"","", "");	
preg_match("/id=\"file-title\">(.*)</i", $data, $dosyaCek);
preg_match("/class=\"file-size\">(.*)</i", $data, $boyut);
	$boyut[1]=str_replace(array( ','), '.',$boyut[1]);	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=$boyut[1];
$jsonveri["filename"]=trim($dosyaCek[1]);
$jsonveri["link"]=$Url;	
          return  json_encode($jsonveri);
}
echo check_turbobit_net($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * Torbobit.net LinkChecker Plugin
 * Date: 24.04.2022
 */

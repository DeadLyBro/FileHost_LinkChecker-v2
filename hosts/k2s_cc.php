<?php
header("content-type:application/json");
function check_k2s_cc($Url){
		$urlKod = explode("/", $Url);
	if(count($urlKod)>4){
	  $fileKod=$urlKod[count($urlKod)-2];
	}else{
		$fileKod=$urlKod[count($urlKod)-1];
	}	
	$post["id"]=$fileKod;
	
	 $data = curl("https://keep2share.cc/api/v2/getFileStatus", "", json_encode($post), 0,1);
	$FileInfo=json_decode($data,true);
	
	if($FileInfo["is_available"]){	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($FileInfo["size"]);
$jsonveri["filename"]=trim($FileInfo["name"]);
$jsonveri["link"]=$Url;
	}else{	
$jsonveri["status"]="";
$jsonveri["link"]=$Url;
	
	}
         return json_encode($jsonveri);		
}

echo check_k2s_cc($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * k2s.cc LinkChecker Plugin
 * Date: 24.04.2022
 */

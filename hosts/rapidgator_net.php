<?php
header("content-type:application/json");

function check_rapidgator_net($Url){ 

	$freeUser="username@mail.com";//Your Free Account Username/Mail
	$freePass="şifre";//Your Free Account password
	
 $data = curl("https://rapidgator.net/api/v2/user/login?login=".$freeUser."&password=".$freePass,"","", "");	
	$jsonRawUserData=json_decode($data,true);	
	 $data = curl("https://rapidgator.net/api/v2/file/check_link?url=".$Url."&token=".$jsonRawUserData["response"]["token"],"","", "");	
	$FileInfo=json_decode($data,true);	
	if($FileInfo["response"][0]["status"]=="ACCESS"){	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($FileInfo["response"][0]["size"]);
$jsonveri["filename"]=trim($FileInfo["response"][0]["filename"]);
$jsonveri["link"]=$Url;
	}else{	
$jsonveri["status"]="";
$jsonveri["link"]=$Url;	
	}
          return  json_encode($jsonveri);
}
echo check_rapidgator_net($Url);

/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * RapidGator.net LinkChecker Plugin
 * Date: 24.04.2022
 */

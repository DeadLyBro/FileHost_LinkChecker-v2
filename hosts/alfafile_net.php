<?php
header("content-type:application/json");
function check_alfafile_net($Url){
	$urlKod = explode("/", $Url);
	if(count($urlKod)>4){
	  $fileKod=$urlKod[count($urlKod)-2];
	}else{
		$fileKod=$urlKod[count($urlKod)-1];
	}	
	$freeUser="username@mail.com";//Your Free Account Username/Mail
	$freePass="şifre";//Your Free Account password
	
 	$data = curl("https://alfafile.net/api/v1/user/login?login=".$freeUser."&password=".$freePass,"","", "");	
	$jsonRawUserData=json_decode($data,true);		
	$data = curl("https://alfafile.net//api/v1/file/info?file_id=".$fileKod."&token=".$jsonRawUserData["response"]["token"],"","", "");	
	$FileInfo=json_decode($data,true);	
	if(!empty($FileInfo["response"]["file"]["name"])){	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($FileInfo["response"]["file"]["size"]);
$jsonveri["filename"]=trim($FileInfo["response"]["file"]["name"]);
$jsonveri["link"]=$Url;
	}else{	
$jsonveri["status"]="";
$jsonveri["link"]=$Url;	
	}
          return json_encode($jsonveri);	
}
echo check_alfafile_net($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * alfafile.net LinkChecker Plugin
 * Date: 25.04.2022
 */

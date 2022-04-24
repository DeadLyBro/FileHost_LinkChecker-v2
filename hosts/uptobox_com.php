<?php
header("content-type:application/json");
function check_uptobox_com($Url){ 
	$urlKod = explode("/", $Url);
	if(count($urlKod)>4){
	  $fileKod=$urlKod[count($urlKod)-2];
	}else{
		$fileKod=$urlKod[count($urlKod)-1];
	}	
	 $data = curl("https://uptobox.com/api/link/info?fileCodes=".$fileKod,"","", "");	
	$FileInfo=json_decode($data,true);
	if(!isset($FileInfo["data"]["list"][0]["error"]["code"])){	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($FileInfo["data"]["list"][0]["file_size"]);
$jsonveri["filename"]=trim($FileInfo["data"]["list"][0]["file_name"]);
$jsonveri["link"]=$Url;
	}else{	
$jsonveri["status"]="";
$jsonveri["link"]=$Url;	
	}
          return  json_encode($jsonveri);
}	
echo check_uptobox_com($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * UPtobox.com LinkChecker Plugin
 * Date: 24.04.2022
 */

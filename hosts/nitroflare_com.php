<?php
header("content-type:application/json");
function check_nitroflare_com($Url){
		$urlKod = explode("/", $Url);
	if(count($urlKod)>4){
	  $fileKod=$urlKod[count($urlKod)-2];
	}else{
		$fileKod=$urlKod[count($urlKod)-1];
	}	
	 $data = curl("https://nitroflare.com/api/v2/getFileInfo?files=".$fileKod,"","", "");	
	$FileInfo=json_decode($data,true);
	if($FileInfo["result"]["files"][$fileKod]["status"]=="online"){	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($FileInfo["result"]["files"][$fileKod]["size"]);
$jsonveri["filename"]=trim($FileInfo["result"]["files"][$fileKod]["name"]);
$jsonveri["link"]=$Url;
	}else{	
$jsonveri["status"]="";
$jsonveri["link"]=$Url;	
	}
          return json_encode($jsonveri);
}

echo check_nitroflare_com($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * nitroflare.com LinkChecker Plugin
 * Date: 25.04.2022
 */

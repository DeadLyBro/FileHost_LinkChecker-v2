<?php
header("content-type:application/json");
function check_filefactory_com($Url){
	
	$urlKod = explode("/", $Url);
	if(count($urlKod)>4){
	  $fileKod=$urlKod[count($urlKod)-2];
	}else{
		$fileKod=$urlKod[count($urlKod)-1];
	}	

	$data = curl("https://api.filefactory.com/v1/getFileInfo?file=".$fileKod,"","", "");	
	$FileInfo=json_decode($data,true);
	
	if(!empty($FileInfo["result"]["files"][$fileKod]["name"])){	
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

echo check_filefactory_com($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * filefactory.com LinkChecker Plugin
 * Date: 24.04.2022
 */

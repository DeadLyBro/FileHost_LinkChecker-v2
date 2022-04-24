<?php
header("content-type:application/json");
function check_1fichier_com($Url){ 
	 $data = curl($Url,"","", "");	
preg_match('/<td class=\"normal\">(.*?)<\/td>/', $data, $dosyaCek);
preg_match('/Size :<\/td><td class=\"normal\">(.*?)<\/td>/', $data, $boyut);
	if(!empty($dosyaCek[1])){		
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=$boyut[1];
$jsonveri["filename"]=trim($dosyaCek[1]);
$jsonveri["link"]=$Url;		
	}else{		
	$jsonveri["status"]="";
	$jsonveri["link"]=$Url;	
	}
          return  json_encode($jsonveri);
}	
echo check_1fichier_com($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * 1fichier.com LinkChecker Plugin
 * Date: 24.04.2022
 */

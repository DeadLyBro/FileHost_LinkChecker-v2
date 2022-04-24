<?php
header("content-type:application/json");
function check_uploaded_net($Url){ 
 $data = curl($Url,"","", "");	
preg_match("/id=\"filename\">(.*)</i", $data, $dosyaCek);
preg_match("/\([^\]]*\)/i", $data, $boyut);
	$boyut[0]=str_replace(array( '(', ')' ), '',$boyut[0]);
	$boyut[0]=str_replace(array( ','), '.',$boyut[0]);
	$size= trim($boyut[0]);		
if(strstr($size,'GB')){   
  $size = str_replace("GB","",$size); 
  $size=trim($size);
  $boyut=1024*1024*1024*$size; 
  }elseif(strstr($size,'MB')){  
  $size = str_replace("MB","",$size); 
  $size=trim($size);
   $boyut=1024*1024*$size;  
  }elseif(strstr($size,'KB')){  
  $size = str_replace("KB","",$size);
  $size=trim($size);
   $boyut=1024*$size; 
	  }	
$jsonveri["status"]="good_link";
$jsonveri["filesize"]=boyutCeviri($boyut);
$jsonveri["filename"]=trim($dosyaCek[1]);
$jsonveri["link"]=$Url;	
          return  json_encode($jsonveri);
}
echo check_uploaded_net($Url);
/*
 * Open Source Project
 * File Host Checker by enesbiber.com.tr
 * Version: 2 LAZENES
 * Uploaded.net LinkChecker Plugin
 * Date: 24.04.2022
 */

<?php
/*
Link Kontrol Edici V2
*/
include("class.php");
include("hosts.php");
$_POST['links'] = str_replace("www.", "", $_POST['links']);
list($Url, $Pass) = explode("|", $_POST['links']);
$url=parse_url($Url);
$GelenHost= $url['host'];
 $sunucu="hosts/".$host[$GelenHost]['file'];
//echo ($_GET['links']);


include($sunucu);

?>
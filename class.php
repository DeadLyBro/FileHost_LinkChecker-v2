<?php
//
//FileHost Link CHecKER Kodlama LAZENES
//
//header("content-type:application/json");

function boyutCeviri($size){
  $base = log($size) / log(1024);
  $suffix = array("", "KB", "MB", "GB", "TB");
  $f_base = floor($base);
  return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];

}
 function curl($url, $cookies, $post, $header = 1, $json = 0, $ref = 0, $xml = 0, $h = NULL)
    {
        $ch = @curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        if ($json == 1) {
            $head[] = "Content-type: application/json";
            $head[] = "X-Requested-With: XMLHttpRequest";
        }
        if ($xml == 1) {
            $head[] = "X-Requested-With: XMLHttpRequest";
        }
        $head[] = "Connection: keep-alive";
        $head[] = "Keep-Alive: 300";
        $head[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $head[] = "Accept-Language: en-us,en;q=0.5";
        if (is_array($h)) {
            $head = array_merge($head, $h);
        }
        if ($cookies) {
            curl_setopt($ch, CURLOPT_COOKIE, $cookies);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36');
        curl_setopt($ch, CURLOPT_REFERER, $ref === 0 ? $url : $ref);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $head);
        if ($header == -1) {
            curl_setopt($ch, CURLOPT_HEADER, 1);
            curl_setopt($ch, CURLOPT_NOBODY, 1);
        } else {
            curl_setopt($ch, CURLOPT_HEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        if ($post) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }   
	 curl_setopt($ch, CURLOPT_POSTREDIR, 3);

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        if (!is_array($h)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Expect:',
            ));
        }
        $page = curl_exec($ch);
        curl_close($ch);
        return $page;
    }



?>
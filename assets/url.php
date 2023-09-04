<?php

/**
 * 
 * Presmerováva na zadanú url adresu
 * 
 * @param string $path = časť adresi , na kt. sa má človek presmerovať
 * 
 * @return void - nevracia nič 
 */

function redirectUrl($path){
if (isset ($_SERVER["HTTPS"]) and $_SERVER["HTTPS"] != "off") {
                $url_protocol = "https";
            } else {
                $url_protocol = "http";
            }
            // localhost = $_SERVER["HTTP_HOST"]
            header ("location: $url_protocol://".$_SERVER["HTTP_HOST"].$path);
            // header("location: jeden-ziak.php?id=$id");
}

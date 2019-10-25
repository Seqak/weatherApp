<?php


class WeatherApi{
    private $city;
    private $temperature;
    private $wind;
    private $clouds;
    private $humidity;
    private $airPressure;

    function __construct($apiQuery, $city){

        $jsonQuery = file_get_contents('');
    }
}

function clear($text){
    $pl = array('Ę','Ó','Ą','Ś','Ł','Ż','Ź','Ć','Ń','ę','ó','ą','ś','ł','ż','ź','ć','ń',"\"",'&quot;',' ',',','!','–','/','\\');
    $notpl = array('E','O','A','S','L','Z','Z','C','N','e','o','a','s','l','z','z','c','n','','','_','_','','','','');
    $text = str_replace($pl,$notpl, $text);
    $text=preg_replace("|\?|","",$text);
    $text=preg_replace("|\W^-|","",$text);
    $text=preg_replace("|_+|","_",$text);
    $text=preg_replace("|_|","-",$text);
    $text=preg_replace("|-+|"," ",$text);
    $text=preg_replace("|-$|"," ",$text);   
    $text=strtolower($text);
    return $text;   
}

echo clear("wrocław");


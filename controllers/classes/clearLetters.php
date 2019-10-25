<?php 

// namespace ClearLetters;

class ClearLetters{
    private $city;

    public function clear($city){
        $pl = array('Ę','Ó','Ą','Ś','Ł','Ż','Ź','Ć','Ń','ę','ó','ą','ś','ł','ż','ź','ć','ń',"\"",'&quot;',' ',',','!','–','/','\\');
        $notpl = array('E','O','A','S','L','Z','Z','C','N','e','o','a','s','l','z','z','c','n','','','_','_','','','','');
        $city = str_replace($pl,$notpl, $city);
        $city=preg_replace("|\?|","",$city);
        $city=preg_replace("|\W^-|","",$city);
        $city=preg_replace("|_+|","_",$city);
        $city=preg_replace("|_|","-",$city);
        $city=preg_replace("|-+|"," ",$city);
        $city=preg_replace("|-$|"," ",$city);   
        $city=strtolower($city);
        $this->city = $city;   
    }

    public function getCity(){
        return $this->city;
    }
}
<?php


class WeatherApi{
    private $city;
    private $temperature;
    private $wind;
    private $clouds;
    private $humidity;
    private $airPressure;
    private $error;

    function __construct($city){

        /////

        // $urlstring = 'https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=cf833ea4d9b83ed6d740d22700d79d1b';

        // $urlstring = 'https://api.openweathermap.org/data/2.5/weather?q=wroclaw&units=metric&appid=cf833ea4d9b83ed6d740d22700d79d1b';

        // $ch = curl_init($urlstring);

        // curl_exec($ch);
        // if (curl_errno($ch)) {
        //     echo "Błąd: " . curl_errno($ch) . ": " . curl_error($ch);
        // }
        // else{
        //     $jsonQuery = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=cf833ea4d9b83ed6d740d22700d79d1b');

        //     $json = json_decode($jsonQuery, true);
    
        //     $this->city = $json['name'];
        //     $this->temperature = $json['main']['temp'];
        //     $this->wind = $json['wind']['speed'];
        //     $this->clouds = $json['clouds']['all'];
        //     $this->humidity = $json['main']['humidity'];
        //     $this->airPressure = $json['main']['pressure'];
        // }

        /////
        $jsonQuery = @file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=cf833ea4d9b83ed6d740d22700d79d1b');

        $json = json_decode($jsonQuery, true);
        
        //Temporary solution for wrong city name serve. Problem with err 60, err 77 HTTP of file_get_contents() method
        if ($json['cod'] == 200 ) {

            //Filling the attributes
            $this->city = $json['name'];
            $this->temperature = $json['main']['temp'];
            $this->wind = $json['wind']['speed'];
            $this->clouds = $json['clouds']['all'];
            $this->humidity = $json['main']['humidity'];
            $this->airPressure = $json['main']['pressure'];
        }
        else{

            echo "Nie znaleziono miasta: " . $city;
            $this->error = 'kupa';
        }
    }

    public function getCity(){
        return $this->city;
    }

    public function getTemp(){
        return $this->temperature;
    }

    public function getWind(){
        return $this->wind;
    }

    public function getClouds(){
        return $this->clouds;
    }

    public function getHumidity(){
        return $this->humidity;
    }

    public function getPressure(){
        return $this->airPressure;
    }

    public function getError(){
        return $this->error;
    }

}



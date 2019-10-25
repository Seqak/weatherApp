<?php


class WeatherApi{
    private $city;
    private $temperature;
    private $wind;
    private $clouds;
    private $humidity;
    private $airPressure;

    function __construct($city){

        $jsonQuery = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q=' . $city . '&units=metric&appid=cf833ea4d9b83ed6d740d22700d79d1b');

        $json = json_decode($jsonQuery, true);

        //Filling the attributes
        $this->city = $json['name'];
        $this->temperature = $json['main']['temp'];
        $this->wind = $json['wind']['speed'];
        $this->clouds = $json['clouds']['all'];
        $this->humidity = $json['main']['humidity'];
        $this->airPressure = $json['main']['pressure'];
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

}



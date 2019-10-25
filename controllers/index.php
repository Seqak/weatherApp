<?php

require('../vendor/autoload.php');
require_once('classes/weatherApi.php');
require_once('classes/clearLetters.php');


//Object which cleaning of polish letters 
$clearCityName = new ClearLetters();

//Object which send a query to the openweathermap's API. Convert JSON to Object
$weather= new WeatherApi('Wroclaw');

// echo "Miasto: " . $weather->getCity() . "<br>";
// echo "Temperatura: " . $weather->getTemp() . "<br>";
// echo "Wiatr: " . $weather->getWind() . "<br>";
// echo "Chmury: " . $weather->getClouds() . "<br>";
// echo "Wilgotność powietrza: " . $weather->getHumidity() . "<br>";
// echo "Ciśnienie: " . $weather->getPressure() . "<br>";

$miasto = $weather->getCity();
$temp = $weather->getTemp();
$wiatr = $weather->getWind();
$chmury = $weather->getClouds();
$humidity = $weather->getHumidity();
$cisnienie = $weather->getPressure();

//Twig tempalte engine
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);


echo $twig->render('index.html', array(
    'alert' => 'Błąd walidacji danych',
    'city' => $miasto,
    'temp' => $temp,
    'wiatr' => $wiatr,
    'chmury' => $chmury,
    'humidity' => $humidity,
    'cisnienie' => $cisnienie,

));
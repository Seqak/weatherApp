<?php
session_start();

require('../vendor/autoload.php');
require_once('classes/weatherApi.php');
require_once('classes/clearLetters.php');
require_once('classes/currentDate.php');
require_once('classes/revisedValue.php');


//Object which cleaning of polish letters 
$clearCityName = new ClearLetters();

//Object which send a query to the openweathermap's API. Convert JSON to Object
$weather= new WeatherApi('wroclaw');

//Object which gives currnet date.
$currentDate = new CurrentDate();
$dateToShow = $currentDate->getDate();

//Communicate the weather data from API -> Object -> variables below. 
$city = $weather->getCity();
$temp = $weather->getTemp();
$wind = $weather->getWind();
$clouds = $weather->getClouds();
$humidity = $weather->getHumidity();
$airpressure = $weather->getPressure();

//Object which convert deg between Celsius and Fahrenheit
// $calculate = new revisedValue();




//Twig tempalte engine
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);

//Render HTML view with Twig. 
echo $twig->render('index.html', array(
    'alert' => 'Błąd walidacji danych',
    'city' => $city,
    'temp' => $temp,
    'wind' => $wind,
    'clouds' => $clouds,
    'humidity' => $humidity,
    'airpressure' => $airpressure,
    'date' => $dateToShow,
));


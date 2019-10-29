<?php
session_start();

require('../vendor/autoload.php');
require_once('classes/weatherApi.php');
require_once('classes/clearLetters.php');
require_once('classes/currentDate.php');
require_once('classes/revisedValue.php');
require_once('classes/monthTranslate.php');


if (isset($_POST['city-name'])) {
    
$cityname = htmlspecialchars($_POST['city-name']); 

// Object which cleaning of polish letters 
$clearCityName = new ClearLetters();
$clearCityName->clear($cityname);
$cityname = $clearCityName->getCity();


//Object which send a query to the openweathermap's API. Convert JSON to Object
$weather = new WeatherApi($cityname);

//Object which gives currnet date.
$currentDate = new CurrentDate();
$day = $currentDate->getDay();
$month = $currentDate->getMonth();

//Object translating the name of the months
$translateMth = new MonthTranslate();
$month = $translateMth->translateMonth($month);

$dateToShow = $currentDate->getDate($month);

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

}
else{
    if (isset($_GET['erro'])) {
    $erro = "Nie znaleziono podanego miasta";

    $loader = new Twig_Loader_Filesystem('../views');
    $twig = new Twig_Environment($loader);

    //Render HTML view with Twig. 
    echo $twig->render('landing.html', array(
        'emptyAlert' => $erro,
        'alert' => $erro,
        'hello' => "Sprawdź pogodę w swoim mieście!",
        ));
    }
    else{
        $loader = new Twig_Loader_Filesystem('../views');
        $twig = new Twig_Environment($loader);

        //Render HTML view with Twig. 
        echo $twig->render('landing.html', array(
            'hello' => "Sprawdź pogodę w swoim mieście!",
        ));
    }
}


<?php

require('../vendor/autoload.php');
require_once('classes/weatherApi.php');
require_once('classes/clearLetters.php');
require_once('classes/currentDate.php');


//Object which cleaning of polish letters 
$clearCityName = new ClearLetters();

//Object which send a query to the openweathermap's API. Convert JSON to Object
$weather= new WeatherApi('olesnica');
if ($weather->getError() == null) {
    
}
else{
    echo "<br>chujowe miasto";
    
}

//Object which get currnet date.
$currentDate = new CurrentDate();
echo "<br>DATA:  " . $currentDate->getDate();

//Communicate the weather data from API -> Object -> variables below. 
$miasto = $weather->getCity();
$temp = $weather->getTemp();
$wiatr = $weather->getWind();
$chmury = $weather->getClouds();
$humidity = $weather->getHumidity();
$cisnienie = $weather->getPressure();

//Twig tempalte engine
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader);

//Render HTML view with Twig. 
echo $twig->render('index.html', array(
    'alert' => 'Błąd walidacji danych',
    'city' => $miasto,
    'temp' => $temp,
    'wiatr' => $wiatr,
    'chmury' => $chmury,
    'humidity' => $humidity,
    'cisnienie' => $cisnienie,
));


/*TO DO
* Obsługa zapytania do API, z miastem które nie istnieje. Tam dropi w JSON tablicę 404. Trzeba jebnąć if'a, który będzie to sprawdzał. 
*
*
*
*/

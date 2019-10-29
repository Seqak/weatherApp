<?php

class MonthTranslate{
    private $month;

    public function translateMonth($mth){
        $monthsPL = array("Styczeń", "Luty", "Marzec", "Kwiecień", "Maj", "Czerwiec", "Lipiec", "Sierpień", "Wrzesień", "Październik","Listopad","Grudzień");

        $monthsENG = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October","November","December");

        $arrayPosition = array_search($mth, $monthsENG);  
        return $monthsPL[$arrayPosition];    
    }
}
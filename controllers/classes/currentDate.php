<?php

class CurrentDate{
    private $date;

    public function getDate(){

        $month = date("F", strtotime("m"));
        $day = date("d");
        $this->date = $month . " " . $day;
        return $this->date;
    }

}
<?php

class CurrentDate{
    private $day;
    private $month;

    public function getDay(){
        $this->day = date("d");
        return $this->day;
    }

    public function getMonth(){
        $this->month = date("F", strtotime("m"));
        return $this->month;
    }

    public function getDate($month){
        $date = $month . ", " . $this->day;
        return $date;
    }
}
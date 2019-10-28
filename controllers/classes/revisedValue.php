<?php

class revisedValue{
    private $celDeg;
    private $fahrDeg;

    public function calculateCel($fahrDeg){
        $celDeg = ($fahrDeg - 32.00) / 1.80;
        round($celDeg);
        return $celDeg;
    }

}
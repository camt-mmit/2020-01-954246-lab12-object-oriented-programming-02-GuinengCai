<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './Car.php';

class Bus extends Car
{
    private $capacity;
    private $nPassenger;
    private $fuel;

    function __construct($owner, $pistonv, $capacity)
    {
        parent::__construct($owner, $pistonv);
        $this->capacity = $capacity;
        $this->nPassenger = 0;
        $this->fuel = 0;
    }

    function runFor($km)
    {
        if($result = parent::runFor($km)) {
            $this->fuel +=
                ($km / 120) * ($this->pistonVolume() / 1000)
                + ((70 * $this->nPassenger * $km) / 10000);
        }
        return $result;
    }

    function fuelUsed()
    {
        return $this->fuel;
    }

    function showLongInfo()
    {
        if($result = parent::showLongInfo()) {
            printf("Current passengers:  %10s\n",
                number_format($this->nPassenger, 0));
        }
        return $result;
    }

    function load($nPassenger)
    {
        if($this->nPassenger + $nPassenger > $this->capacity) {
            fprintf(STDERR, "Number of passengers greater than capacity!!!\n");
            return false;
        }
        $this->nPassenger += $nPassenger;
        return true;
    }

    function unload($nPassenger)
    {
        if($this->nPassenger - $nPassenger < 0) {
            fprintf(STDERR, "Number of passengers less than 0!!!\n");
            return false;
        }
        $this->nPassenger -= $nPassenger;
        return true;
    }
}
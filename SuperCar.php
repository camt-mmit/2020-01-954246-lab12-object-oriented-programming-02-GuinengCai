<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './Car.php';



class SuperCar extends Car

{

    public function fuelUsed()

    {

        return ($this->runningDistance() / 10) * ($this->pistonVolume() / 1000);

    }

}


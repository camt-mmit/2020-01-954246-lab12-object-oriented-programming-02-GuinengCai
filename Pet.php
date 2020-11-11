<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './Runnable.php';
require_once './ShowInfo.php';

class Pet implements Runnable, ShowInfo
{
    private $name;
    private $distance;

    function __construct($name)
    {
        $this->name = $name;
        $this->distance = 0;
    }

    function getName()
    {
        return $this->name;
    }

    function runningDistance()
    {
        return $this->distance;
    }

    function runFor($km)
    {
        $this->distance += $km;
        return true;
    }

    function showInfo()
    {
        printf("Name: %s\n", $this->name);
        return true;
    }

    function showLongInfo()
    {
        if($this->showInfo()) {
            printf("Running distance:    %10s km\n",
                number_format($this->distance, 0));
        } else {
            return false;
        }
        return true;
    }
}

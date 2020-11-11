<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './Person.php';
require_once './ShowInfo.php';

class PetLover extends Person implements ShowInfo
{
    private $distance;
    private $takenPets;

    function __construct($name)
    {
        parent::__construct($name);
        $this->distance = 0;
        $this->takenPets = [];
    }

    function runFor($km)
    {
        if($result = parent::runFor($km)) {
            foreach($this->takenPets as $pet) {
                $pet->runFor($km);
            }
        }
        return $result;
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
                number_format($this->runningDistance(), 0));
            printf("Current taken pets: %s\n",
                implode(", ", array_map(function($pet) {
                    return $pet->getName();
                }, $this->takenPets)));
        } else {
            return false;
        }
        return true;
    }

    function takePet($pet)
    {
        if(array_key_exists($pet->getName(), $this->takenPets)) return false;
        $this->takenPets[$pet->getName()] = $pet;
        return true;
    }

    function releasePet($pet)
    {
        if(!array_key_exists($pet->getName(), $this->takenPets)) return false;
        unset($this->takenPets[$pet->getName()]);
        return false;
    }
}

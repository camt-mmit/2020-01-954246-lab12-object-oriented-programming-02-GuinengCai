<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './PetLover.php';
require_once './Pet.php';

$fp = fopen($_SERVER['argv'][1], 'r');
fscanf($fp, "%s", $petLoverName);
$petLover = new PetLover($petLoverName);
fscanf($fp, "%d", $nPet);
$pets = [];
for($i = 0; $i < $nPet; $i++) {
    fscanf($fp, "%s", $petName);
    $pets[$petName] = new Pet($petName);
}
fscanf($fp, "%d", $nCommand);
for($i = 0; $i < $nCommand; $i++) {
    $command = null;
    $value = null;
    fscanf($fp, "%s %s", $command, $value);
    switch($command) {
        case 't':
            $petLover->takePet($pets[$value]);
        break;
        case 're':
            $petLover->releasePet($pets[$value]);
        break;
        case 'r':
            $petLover->runFor((int)$value);
        break;
    }
}
fclose($fp);

$petLover->showLongInfo();
printf("%s\n", str_repeat('=', 40));
foreach($pets as $pet) {
    $pet->showLongInfo();
    printf("%s\n", str_repeat('-', 40));
}

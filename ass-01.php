<?php
/*ID: 612110237
Name: Guineng Cai 
*/
require_once './Bus.php';

printf("Input (owner cc capacity): ");
fscanf(STDIN, "%s %d %d", $owner, $cc, $capacity);
$bus = new Bus($owner, $cc, $capacity);

while(true) {
    printf("command (h for help): ");
    $command = null;
    $value = null;
    fscanf(STDIN, "%s %d", $command, $value);
    if(strtolower($command) === 'e') break;
    switch(strtolower($command)) {
        case '0':
            $bus->engineStop();
        break;
        case '1':
            $bus->engineStart();
        break;
        case 'r':
            $bus->runFor($value);
        break;
        case '+':
            $bus->load($value);
        break;
        case '-':
            $bus->unload($value);
        break;
        case 'i':
            $bus->showLongInfo();
        break;
        case 'h':
            printf(
<<<EOT
 0 stop engine
 1 start engine
 r run for the given km
 + load the given number of passengers into bus
 - unload the given number of passenger out of bus
 i show information (engine is off only)
 e exit
 h print this help

EOT
            );
        break;
        default:
            fprintf(STDERR, "Unkown command '%s' !!!\n", $command);
    }
}

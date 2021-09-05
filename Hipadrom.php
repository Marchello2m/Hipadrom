<?php

function createHorse($name, $symbol, $start,$id,$qf): stdClass
{
    $horse= new stdClass();
    $horse->name = $name;
    $horse->symbol = $symbol;
    $horse->start = $start;
    $horse->id = $id;
    $horse->qf = $qf;


    return $horse;
}

$Horses = [
    createHorse('TunderHorse', '#', 0,0,5),
    createHorse('WindHorse', 'X', 0,1,2),
    createHorse('Lighting', '@', 0,2,3)
];


echo "Welcome To Olympe :D" . PHP_EOL;
echo "---------MAZE RUNNERS ----------" . PHP_EOL;
foreach ($Horses as $key => $horse) {
    echo "{$horse->name}({$horse->symbol})and ID is :{$horse->id}" . PHP_EOL;
}

echo"_____________________________".PHP_EOL;
$selection=(int)readline("Select your Horse: ");
echo"_____________________________".PHP_EOL;
if(!isset($Horses[$selection]))
{echo"!!!!!!!!!".PHP_EOL;
    echo "Horse is not born yet".PHP_EOL;
    echo"!!!!!!!!!".PHP_EOL;
    exit;
}
$putmoney=readline("Hom much to put ? : ").PHP_EOL;
$ruad = ["_", "_", "_", "_", "_", "_", "_", "_", "_", "_", "_",];
$end = [];
$QFC=[];
echo "---------START THE RACE----------" . PHP_EOL;
$run = function ($player) use ($ruad, $end, $Horses) {
    $ruad[$player->start] = $player->symbol;
    $player->start += rand(1, 2);
    echo $player->start . implode($ruad) . "\n";
};

for ($i = 0; $i < 10; $i++) {
    foreach ($Horses as $horse)
        if ($horse->start < 10) {
            $run($horse);
        } else {
            $end[] = $horse->id;//-ko saglabat end[] name,syumbol,id..
            $QFC[] = $horse->qf;
        }
    sleep(1);
    echo "\n";
}


echo "---------WINNERS CIRCUIT----------" . PHP_EOL;
$end = array_unique($end);
$QFC = array_unique($QFC);
foreach ($end as $place => $runners ) {

    echo $place  . " place->  $runners  " . "\n";
}
function coefs($Horses)
{
    foreach ($Horses as $horse1)
    {
        return  $horse1->qf;
    }
}




echo"_____________________________".PHP_EOL;
echo "You bet on . $selection".PHP_EOL;
echo "You place : ".$putmoney ."$".PHP_EOL;
echo"_____________________________".PHP_EOL;

if($selection===$end[0]){

  //echo "You winn  . " . ($putmoney *  coefs($Horses)) .PHP_EOL;
   echo "you winn    " .$putmoney * $QFC[0]  .PHP_EOL;

}else{
echo "You didnt winn ! ".PHP_EOL;
}



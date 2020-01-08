<?php

require_once "vendor/autoload.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$hero = new \eMAG\Characters\Hero();
$hero->setName('Orderus')
    ->setHealth(rand(70, 100))
    ->setStrength(rand(70, 80))
    ->setDefence(rand(45, 55))
    ->setSpeed(rand(40, 50))
    ->setLuck(rand(10, 30))
    ->setSkills(
        [
            'rapid_strike' => 10,
            'magic_shield' => 20
        ]
    );


$beast = new \eMAG\Characters\Beast();
$beast->setName('Beast')
    ->setHealth(rand(60, 90))
    ->setStrength(rand(60, 90))
    ->setDefence(rand(40, 60))
    ->setSpeed(rand(40, 60))
    ->setLuck(rand(25, 40));

$attackOrder = new \eMAG\Rules\AttackOrderRule($hero, $beast);

$game = new \eMAG\Game($attackOrder->get()[0], $attackOrder->get()[1]);
$game->start();

echo "<pre>";
foreach ($game->getLog() as $logItem) {
    echo $logItem . PHP_EOL;
}

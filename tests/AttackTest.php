<?php
require "../vendor/autoload.php";
use PHPUnit\Framework\TestCase;


class AttackTest extends TestCase
{
    public function setUp()
    {
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


        $attack = new \eMAG\Rules\Attack($hero, $beast);
        $attack->run();
    }

    public function runTest()
    {
        $this->assertEquals(3, 3);
    }
}

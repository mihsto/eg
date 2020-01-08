<?php

namespace eMAG;

use eMAG\Characters\Character;
use eMAG\Rules\Attack;
use eMAG\Skills\MagicShieldSkill;
use eMAG\Skills\RapidStrikeSkill;

class Game
{
    private $rounds = 20;
    private $currentRound = 0;

    private $attacker;
    private $defender;

    private $logs = [];

    /**
     * Game constructor.
     * @param Character $attacker
     * @param Character $defender
     */
    public function __construct(Character $attacker, Character $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    /**
     *
     */
    public function start()
    {
        $this->logs[] = $this->attacker->getName() . ' is attacking first';

        while ($this->currentRound < $this->rounds) {
            // create new attack
            $attack = new Attack($this->attacker, $this->defender);
            $attack->run();

            /** update life */
            $this->defender->setHealth($this->defender->getHealth() - $attack->getDamage());

            /** log strings */
            $this->logRound($attack->getLog());
            if($this->defender->getHealth() < 1) {
                $this->logRound(sprintf('%s lost the battle', $this->defender->getName()));
                break;
            }

            $this->logRound(sprintf('%s still have %d life', $this->defender->getName(), $this->defender->getHealth()));

            /** counting rounds */
            $this->addRound();

            /** change attacker with defender */
            $this->swapPlayers();
        }

        $this->logs[] = $this->logRound(sprintf('%s is the winner', $this->attacker->getName()));
    }

    /**
     *
     */
    private function swapPlayers()
    {
        $temp = $this->attacker;
        $this->attacker = $this->defender;
        $this->defender = $temp;
    }

    private function addRound()
    {
        $this->currentRound++;
    }

    /**
     * @param string $message
     */
    private function logRound(string $message)
    {
        $this->logs[] = $message;
    }

    /**
     * @return array
     */
    public function getLog()
    {
        return $this->logs;
    }
}

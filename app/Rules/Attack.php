<?php


namespace eMAG\Rules;

use eMAG\Characters\Character;
use eMAG\Skills\RapidStrikeSkill;
use eMAG\Skills\MagicShieldSkill;

class Attack implements ActionInterface
{
    private $attacker;
    private $defender;
    private $log = '';
    private $damage = 0;

    public function __construct(Character $attacker, Character $defender)
    {
        $this->attacker = $attacker;
        $this->defender = $defender;
    }

    /**
     *
     */
    public function run()
    {
        $this->log = $this->defender->getName() . ' is lucky this turn and deals with 0 damage!';

        if (!$this->defender->isLucky()) {
            $this->damage = $this->attacker->getStrength() - $this->defender->getDefence();
            $this->log = sprintf('%s hits %s with %d damage!', $this->attacker->getName(), $this->defender->getName(), $this->damage);
        } elseif ($this->defender->hasSkills()) {
            $magicShield = new MagicShieldSkill($this->defender);
            if ($magicShield->useSkill()) {
                $this->damage = $magicShield->get()['damage'];
                $this->log = sprintf('%s uses magic_shiled and damage is only %d!', $this->defender->getName(), $this->damage);
            }
        } elseif ($this->attacker->hasSkills()) {
            $rapidStrike = new RapidStrikeSkill($this->attacker);
            if ($rapidStrike->useSkill()) {
                $this->damage = $rapidStrike->get()['damage'];
                $this->log = sprintf('%s uses rapid_strike and make damage * 2 = %d', $this->attacker->getName(), $this->damage);
            }
        }
    }

    /**
     * @return int
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return string
     */
    public function getLog(): string
    {
        return $this->log;
    }

    /**
     * @return array
     */
    public function get()
    {
        return [
            'damage' => $this->damage,
            'log' => $this->log
        ];
    }
}

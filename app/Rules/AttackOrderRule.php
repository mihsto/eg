<?php

namespace eMAG\Rules;

use eMAG\Characters\Character;

class AttackOrderRule
{
    private $hero;
    private $beast;

    /**
     * AttackOrderRule constructor.
     * @param Character $hero
     * @param Character $beast
     */
    public function __construct(Character $hero, Character $beast)
    {
        $this->hero = $hero;
        $this->beast = $beast;
    }

    /**
     * @return array
     */
    public function get()
    {
        $characters = [
            $this->hero,
            $this->beast
        ];

        uasort(
            $characters,
            function ($a, $b) {
                if ($a->getSpeed() == $b->getSpeed()) {
                    if($a->getLuck() < $b->getLuck()) {
                        return $a->getLuck() < $b->getLuck();
                    }

                }

                return $a->getSpeed() < $b->getSpeed();
            }
        );

        return $characters;
    }
}

<?php


namespace eMAG\Skills;


use eMAG\Characters\Character;

abstract class Skill
{
    protected $character;
    protected $log = [];

    public function __construct(Character $character)
    {
        $this->character = $character;
    }
}

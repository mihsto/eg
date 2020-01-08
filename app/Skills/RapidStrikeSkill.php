<?php

namespace eMAG\Skills;


class RapidStrikeSkill extends Skill implements SkillInterface
{
    private $skillName = 'rapid_strike';

    public function useSkill()
    {
        return rand(1, 100) < $this->character->getSkills()[$this->skillName];
    }

    public function get()
    {
        return [
            'damage' => $this->character->getStrength() * 2,
        ];
    }
}

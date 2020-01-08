<?php

namespace eMAG\Skills;

class MagicShieldSkill extends Skill implements SkillInterface
{
    private $skillName = 'magic_shield';

    public function useSkill()
    {
        return rand(1, 100) < $this->character->getSkills()[$this->skillName];
    }

    /**
     * @return array
     */
    public function get()
    {
        return [
            'damage' => $this->character->getStrength() / 2,
        ];
    }
}

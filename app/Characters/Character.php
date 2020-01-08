<?php

namespace eMAG\Characters;

abstract class Character
{
    protected $name;

    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;
    protected $skills = [];

    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $name
     * @return Character
     */
    public function setName($name): Character
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param $health
     * @return Character
     */
    public function setHealth($health): Character
    {
        $this->health = $health;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param $strength
     * @return Character
     */
    public function setStrength($strength): Character
    {
        $this->strength = $strength;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefence()
    {
        return $this->defence;
    }

    /**
     * @param $defence
     * @return Character
     */
    public function setDefence($defence): Character
    {
        $this->defence = $defence;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSpeed()
    {
        return $this->speed;
    }

    /**
     * @param $speed
     * @return Character
     */
    public function setSpeed($speed): Character
    {
        $this->speed = $speed;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuck()
    {
        return $this->luck;
    }

    /**
     * @param $luck
     * @return Character
     */
    public function setLuck($luck): Character
    {
        $this->luck = $luck;

        return $this;
    }

    /**
     * @param array $skills
     * @return Character
     */
    public function setSkills(array $skills): Character
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSkills(): array
    {
        return $this->skills;
    }

    /**
     * @return bool
     */
    public function isLucky(): bool
    {
        return rand(1, 100) < $this->luck;
    }

    /**
     * @return bool
     */
    public function hasSkills(): bool
    {
        return count($this->skills) > 0;
    }
}

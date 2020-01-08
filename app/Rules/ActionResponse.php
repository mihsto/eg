<?php


namespace eMAG\Rules;


class ActionResponse
{
    private $damage;
    private $log;

    public function __construct($damage, $log)
    {
        $this->damage = $damage;
        $this->log = $log;
    }

    /**
     * @return mixed
     */
    public function getDamage()
    {
        return $this->damage;
    }

    /**
     * @return mixed
     */
    public function getLog()
    {
        return $this->log;
    }

    public function get()
    {
        return [
            'damage' => $this->damage,
            'log' => $this->log
        ];
    }
}

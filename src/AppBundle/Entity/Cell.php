<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cell
 *
 */
class Cell
{
    /**
     * @var string
     */
    private $x;

    /**
     * @var string
     */
    private $y;

    /**
     * @var string
     */
    private $decoration;

    /**
     * @var string
     */
    private $monster;

    /**
     * @var string
     */
    private $trigger;

    /**
     * @return string
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param string $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return string
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param string $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return string
     */
    public function getDecoration()
    {
        return $this->decoration;
    }

    /**
     * @param string $decoration
     */
    public function setDecoration($decoration)
    {
        $this->decoration = $decoration;
    }

    /**
     * @return string
     */
    public function getMonster()
    {
        return $this->monster;
    }

    /**
     * @param string $monster
     */
    public function setMonster($monster)
    {
        $this->monster = $monster;
    }

    /**
     * @return string
     */
    public function getTrigger()
    {
        return $this->trigger;
    }

    /**
     * @param string $trigger
     */
    public function setTrigger($trigger)
    {
        $this->trigger = $trigger;
    }


}


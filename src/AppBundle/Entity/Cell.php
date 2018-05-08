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
    public $x;

    /**
     * @var string
     */
    public $y;

    /**
     * @var string
     */
    public $decoration;

    /**
     * @var string
     */
    public $obstacle;

    /**
     * @var string
     */
    public $monster;

    /**
     * @var string
     */
    public $trigger;

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
    public function getObstacle()
    {
        return $this->obstacle;
    }

    /**
     * @param string $obstacle
     */
    public function setObstacle($obstacle)
    {
        $this->obstacle = $obstacle;
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


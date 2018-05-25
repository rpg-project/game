<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monsters
 *
 * @ORM\Table(name="monsters")
 * @ORM\Entity
 */
class Monsters
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="health", type="integer", nullable=true)
     */
    private $health;

    /**
     * @var integer
     *
     * @ORM\Column(name="energy", type="integer", nullable=true)
     */
    private $energy;

    /**
     * @var integer
     *
     * @ORM\Column(name="move", type="integer", nullable=true)
     */
    private $move;

    /**
     * @var integer
     *
     * @ORM\Column(name="quickness", type="integer", nullable=true)
     */
    private $quickness;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack", type="integer", nullable=true)
     */
    private $attack;

    /**
     * @var integer
     *
     * @ORM\Column(name="defense", type="integer", nullable=true)
     */
    private $defense;

    /**
     * @var integer
     *
     * @ORM\Column(name="critical", type="integer", nullable=true)
     */
    private $critical;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    private $dateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="kill", type="integer", nullable=true)
     */
    private $kill;

    /**
     * @var integer
     *
     * @ORM\Column(name="kill_title", type="integer", nullable=true)
     */
    private $killTitle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * @param int $energy
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;
    }

    /**
     * @return int
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @param int $move
     */
    public function setMove($move)
    {
        $this->move = $move;
    }

    /**
     * @return int
     */
    public function getQuickness()
    {
        return $this->quickness;
    }

    /**
     * @param int $quickness
     */
    public function setQuickness($quickness)
    {
        $this->quickness = $quickness;
    }

    /**
     * @return int
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @param int $attack
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;
    }

    /**
     * @return int
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * @return int
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * @param int $critical
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDateInfo()
    {
        return $this->dateInfo;
    }

    /**
     * @param \DateTime $dateInfo
     */
    public function setDateInfo($dateInfo)
    {
        $this->dateInfo = $dateInfo;
    }

    /**
     * @return int
     */
    public function getKill()
    {
        return $this->kill;
    }

    /**
     * @param int $kill
     */
    public function setKill($kill)
    {
        $this->kill = $kill;
    }

    /**
     * @return int
     */
    public function getKillTitle()
    {
        return $this->killTitle;
    }

    /**
     * @param int $killTitle
     */
    public function setKillTitle($killTitle)
    {
        $this->killTitle = $killTitle;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


}


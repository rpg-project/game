<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Places
 *
 * @ORM\Table(name="places")
 * @ORM\Entity
 */
class Places
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=50, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="summon", type="integer", nullable=true)
     */
    private $summon;

    /**
     * @var integer
     *
     * @ORM\Column(name="quest", type="integer", nullable=true)
     */
    private $quest;

    /**
     * @var integer
     *
     * @ORM\Column(name="training", type="integer", nullable=true)
     */
    private $training;

    /**
     * @var integer
     *
     * @ORM\Column(name="craft", type="integer", nullable=true)
     */
    private $craft;

    /**
     * @var integer
     *
     * @ORM\Column(name="merchant", type="integer", nullable=true)
     */
    private $merchant;

    /**
     * @var integer
     *
     * @ORM\Column(name="arena", type="integer", nullable=true)
     */
    private $arena;

    /**
     * @var integer
     *
     * @ORM\Column(name="healing", type="integer", nullable=true)
     */
    private $healing;

    /**
     * @var integer
     *
     * @ORM\Column(name="info", type="integer", nullable=true)
     */
    private $info;

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
    public function getSummon()
    {
        return $this->summon;
    }

    /**
     * @param int $summon
     */
    public function setSummon($summon)
    {
        $this->summon = $summon;
    }

    /**
     * @return int
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * @param int $quest
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;
    }

    /**
     * @return int
     */
    public function getTraining()
    {
        return $this->training;
    }

    /**
     * @param int $training
     */
    public function setTraining($training)
    {
        $this->training = $training;
    }

    /**
     * @return int
     */
    public function getCraft()
    {
        return $this->craft;
    }

    /**
     * @param int $craft
     */
    public function setCraft($craft)
    {
        $this->craft = $craft;
    }

    /**
     * @return int
     */
    public function getMerchant()
    {
        return $this->merchant;
    }

    /**
     * @param int $merchant
     */
    public function setMerchant($merchant)
    {
        $this->merchant = $merchant;
    }

    /**
     * @return int
     */
    public function getArena()
    {
        return $this->arena;
    }

    /**
     * @param int $arena
     */
    public function setArena($arena)
    {
        $this->arena = $arena;
    }

    /**
     * @return int
     */
    public function getHealing()
    {
        return $this->healing;
    }

    /**
     * @param int $healing
     */
    public function setHealing($healing)
    {
        $this->healing = $healing;
    }

    /**
     * @return int
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param int $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
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


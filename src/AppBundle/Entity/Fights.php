<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fights
 *
 * @ORM\Table(name="fights", indexes={@ORM\Index(name="questId_idx", columns={"quest_id"}), @ORM\Index(name="fightzone_id_idx", columns={"fight_zone_id"})})
 * @ORM\Entity
 */
class Fights
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Quests
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="quest_id", referencedColumnName="id")
     * })
     */
    private $quest;

    /**
     * @var \AppBundle\Entity\Map
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Map")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fight_zone_id", referencedColumnName="id")
     * })
     */
    private $fightZone;

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

    /**
     * @return Quests
     */
    public function getQuest()
    {
        return $this->quest;
    }

    /**
     * @param Quests $quest
     */
    public function setQuest($quest)
    {
        $this->quest = $quest;
    }

    /**
     * @return Map
     */
    public function getFightZone()
    {
        return $this->fightZone;
    }

    /**
     * @param Map $fightZone
     */
    public function setFightZone($fightZone)
    {
        $this->fightZone = $fightZone;
    }


}


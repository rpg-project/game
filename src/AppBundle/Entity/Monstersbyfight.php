<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Monstersbyfight
 *
 * @ORM\Table(name="monstersByFight", indexes={@ORM\Index(name="monsterId_idx", columns={"monster_id"}), @ORM\Index(name="f_id_idx", columns={"fight_id"})})
 * @ORM\Entity
 */
class Monstersbyfight
{
    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Monsters
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Monsters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="monster_id", referencedColumnName="id")
     * })
     */
    private $monster;

    /**
     * @var \AppBundle\Entity\Fights
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Fights")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="fight_id", referencedColumnName="id")
     * })
     */
    private $fight;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
     * @return Monsters
     */
    public function getMonster()
    {
        return $this->monster;
    }

    /**
     * @param Monsters $monster
     */
    public function setMonster($monster)
    {
        $this->monster = $monster;
    }

    /**
     * @return Fights
     */
    public function getFight()
    {
        return $this->fight;
    }

    /**
     * @param Fights $fight
     */
    public function setFight($fight)
    {
        $this->fight = $fight;
    }


}


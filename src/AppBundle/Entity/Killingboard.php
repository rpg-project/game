<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Killingboard
 *
 * @ORM\Table(name="KillingBoard")
 * @ORM\Entity
 */
class Killingboard
{
    /**
     * @var integer
     *
     * @ORM\Column(name="monsterId", type="integer", nullable=true)
     */
    private $monsterid;

    /**
     * @var integer
     *
     * @ORM\Column(name="characterId", type="integer", nullable=true)
     */
    private $characterid;

    /**
     * @var integer
     *
     * @ORM\Column(name="kills", type="integer", nullable=true)
     */
    private $kills;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getMonsterid()
    {
        return $this->monsterid;
    }

    /**
     * @param int $monsterid
     */
    public function setMonsterid($monsterid)
    {
        $this->monsterid = $monsterid;
    }

    /**
     * @return int
     */
    public function getCharacterid()
    {
        return $this->characterid;
    }

    /**
     * @param int $characterid
     */
    public function setCharacterid($characterid)
    {
        $this->characterid = $characterid;
    }

    /**
     * @return int
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * @param int $kills
     */
    public function setKills($kills)
    {
        $this->kills = $kills;
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


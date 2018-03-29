<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitiesbycharacter
 *
 * @ORM\Table(name="capacitiesByCharacter", indexes={@ORM\Index(name="characterId_idx", columns={"characterId"})})
 * @ORM\Entity
 */
class Capacitiesbycharacter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="capacityId", type="integer", nullable=true)
     */
    private $capacityid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Characters
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Characters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="characterId", referencedColumnName="id")
     * })
     */
    private $characterid;

    /**
     * @return int
     */
    public function getCapacityid()
    {
        return $this->capacityid;
    }

    /**
     * @param int $capacityid
     */
    public function setCapacityid($capacityid)
    {
        $this->capacityid = $capacityid;
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
     * @return Characters
     */
    public function getCharacterid()
    {
        return $this->characterid;
    }

    /**
     * @param Characters $characterid
     */
    public function setCharacterid($characterid)
    {
        $this->characterid = $characterid;
    }


}


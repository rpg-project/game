<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitiesbymonster
 *
 * @ORM\Table(name="capacitiesByMonster", indexes={@ORM\Index(name="monsterId_idx", columns={"monsterId"}), @ORM\Index(name="capId_idx", columns={"capacityId"})})
 * @ORM\Entity
 */
class Capacitiesbymonster
{
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
     *   @ORM\JoinColumn(name="monsterId", referencedColumnName="id")
     * })
     */
    private $monsterid;

    /**
     * @var \AppBundle\Entity\Capacities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Capacities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="capacityId", referencedColumnName="id")
     * })
     */
    private $capacityid;

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
    public function getMonsterid()
    {
        return $this->monsterid;
    }

    /**
     * @param Monsters $monsterid
     */
    public function setMonsterid($monsterid)
    {
        $this->monsterid = $monsterid;
    }

    /**
     * @return Capacities
     */
    public function getCapacityid()
    {
        return $this->capacityid;
    }

    /**
     * @param Capacities $capacityid
     */
    public function setCapacityid($capacityid)
    {
        $this->capacityid = $capacityid;
    }


}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Placesbymap
 *
 * @ORM\Table(name="placesByMap", indexes={@ORM\Index(name="mapId_idx", columns={"mapId"})})
 * @ORM\Entity
 */
class Placesbymap
{
    /**
     * @var integer
     *
     * @ORM\Column(name="placeId", type="integer", nullable=true)
     */
    private $placeid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Map
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Map")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mapId", referencedColumnName="id")
     * })
     */
    private $mapid;

    /**
     * @return int
     */
    public function getPlaceid()
    {
        return $this->placeid;
    }

    /**
     * @param int $placeid
     */
    public function setPlaceid($placeid)
    {
        $this->placeid = $placeid;
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
     * @return Map
     */
    public function getMapid()
    {
        return $this->mapid;
    }

    /**
     * @param Map $mapid
     */
    public function setMapid($mapid)
    {
        $this->mapid = $mapid;
    }


}


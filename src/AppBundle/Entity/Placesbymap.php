<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Placesbymap
 *
 * @ORM\Table(name="placesByMap", indexes={@ORM\Index(name="mapId_idx", columns={"mapId"}), @ORM\Index(name="place_idx", columns={"placeId"})})
 * @ORM\Entity
 */
class Placesbymap
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
     * @var \AppBundle\Entity\Places
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Places")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="placeId", referencedColumnName="id")
     * })
     */
    private $placeid;

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
     * @return Places
     */
    public function getPlaceid()
    {
        return $this->placeid;
    }

    /**
     * @param Places $placeid
     */
    public function setPlaceid($placeid)
    {
        $this->placeid = $placeid;
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Map
 *
 * @ORM\Table(name="map", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Map
{
    /**
     * @var string
     *
     * @ORM\Column(name="map_name", type="string", length=50, nullable=true)
     */
    public $mapName;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="int", type="integer", nullable=true)
     */
    public $type;

    /**
     * @var string
     *
     * @ORM\Column(name="width", type="string", length=45, nullable=true)
     */
    public $width;

    /**
     * @var string
     *
     * @ORM\Column(name="height", type="string", length=45, nullable=true)
     */
    public $height;

    /**
     * @var string
     *
     * @ORM\Column(name="key_id", type="int", type="integer", nullable=true)
     */
    public $keyId;

    /**
     * @var string
     *
     * @ORM\Column(name="map_content", type="text", length=65535, nullable=true)
     */
    public $mapContent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    public $dateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @return string
     */
    public function getMapName()
    {
        return $this->mapName;
    }

    /**
     * @param string $mapName
     */
    public function setMapName($mapName)
    {
        $this->mapName = $mapName;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
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
     * @return int
     */
    public function getKeyid()
    {
        return $this->keyId;
    }

    /**
     * @param int $keyId
     */
    public function setKeyid($keyId)
    {
        $this->keyId = $keyId;
    }

    /**
     * @return string
     */
    public function getMapContent()
    {
        return $this->mapContent;
    }

    /**
     * @param string $mapContent
     */
    public function setMapContent($mapContent)
    {
        $this->mapContent = $mapContent;
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

}


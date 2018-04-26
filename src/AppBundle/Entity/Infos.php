<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infos
 *
 * @ORM\Table(name="Infos", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity(repositoryClass="AppBundle\Entity\InfosRepository")
 */
class Infos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    public $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="infos", type="text", length=65535, nullable=true)
     */
    public $infos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    public $dateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="place_id", type="integer", nullable=true)
     */
    public $placeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getInfos()
    {
        return $this->infos;
    }

    /**
     * @param string $infos
     */
    public function setInfos($infos)
    {
        $this->infos = $infos;
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
    public function getPlaceId()
    {
        return $this->placeId;
    }

    /**
     * @param int $placeId
     */
    public function setPlaceId($placeId)
    {
        $this->placeId = $placeId;
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


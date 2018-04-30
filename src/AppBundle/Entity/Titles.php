<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Titles
 *
 * @ORM\Table(name="Titles", indexes={@ORM\Index(name="mobId_idx", columns={"monsterId"})})
 * @ORM\Entity
 */
class Titles
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    public $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    public $dateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    public $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var \AppBundle\Entity\Monsters
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Monsters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="monsterId", referencedColumnName="id")
     * })
     */
    public $monsterid;

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


}


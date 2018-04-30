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
    private $title;

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
     *   @ORM\JoinColumn(name="monsterId", referencedColumnName="id")
     * })
     */
    private $monsterid;

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


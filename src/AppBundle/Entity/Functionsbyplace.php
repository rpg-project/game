<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Functionsbyplace
 *
 * @ORM\Table(name="functionsByPlace", indexes={@ORM\Index(name="placeId_idx", columns={"placeId"}), @ORM\Index(name="functionId_idx", columns={"functionId"})})
 * @ORM\Entity
 */
class Functionsbyplace
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
     * @var \AppBundle\Entity\Placesfunction
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Placesfunction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="functionId", referencedColumnName="id")
     * })
     */
    private $functionid;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;


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
     * @return Placesfunction
     */
    public function getFunctionid()
    {
        return $this->functionid;
    }

    /**
     * @param Placesfunction $functionid
     */
    public function setFunctionid($functionid)
    {
        $this->functionid = $functionid;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }



}


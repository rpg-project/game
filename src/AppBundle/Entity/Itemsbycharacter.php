<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itemsbycharacter
 *
 * @ORM\Table(name="itemsByCharacter", indexes={@ORM\Index(name="characterId_idx", columns={"characterId"}), @ORM\Index(name="itemId_idx", columns={"itemId"})})
 * @ORM\Entity
 */
class Itemsbycharacter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="equiped", type="integer", nullable=true)
     */
    private $equiped;

    /**
     * @var integer
     *
     * @ORM\Column(name="contained", type="integer", nullable=true)
     */
    private $contained;

    /**
     * @var integer
     *
     * @ORM\Column(name="container_space", type="integer", nullable=true)
     */
    private $containerSpace;

    /**
     * @var integer
     *
     * @ORM\Column(name="characterId", type="integer", nullable=true)
     */
    private $characterid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Items
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="itemId", referencedColumnName="id")
     * })
     */
    private $itemid;

    /**
     * @return int
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * @param int $equiped
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
    }

    /**
     * @return int
     */
    public function getContained()
    {
        return $this->contained;
    }

    /**
     * @param int $contained
     */
    public function setContained($contained)
    {
        $this->contained = $contained;
    }

    /**
     * @return int
     */
    public function getContainerSpace()
    {
        return $this->containerSpace;
    }

    /**
     * @param int $containerSpace
     */
    public function setContainerSpace($containerSpace)
    {
        $this->containerSpace = $containerSpace;
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
     * @return Items
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * @param Items $itemid
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;
    }


}


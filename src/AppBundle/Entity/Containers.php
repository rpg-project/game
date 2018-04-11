<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Containers
 *
 * @ORM\Table(name="containers", indexes={@ORM\Index(name="itemId_idx", columns={"itemsId"}), @ORM\Index(name="containerId_idx", columns={"containerId"})})
 * @ORM\Entity
 */
class Containers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="weigth", type="integer", nullable=true)
     */
    private $weigth;

    /**
     * @var integer
     *
     * @ORM\Column(name="itemsId", type="integer", nullable=true)
     */
    private $itemsid;

    /**
     * @var integer
     *
     * @ORM\Column(name="containerId", type="integer", nullable=true)
     */
    private $containerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="characterdId", type="integer", nullable=true)
     */
    private $characterdid;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @return int
     */
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * @param int $weigth
     */
    public function setWeigth($weigth)
    {
        $this->weigth = $weigth;
    }

    /**
     * @return int
     */
    public function getItemsid()
    {
        return $this->itemsid;
    }

    /**
     * @param int $itemsid
     */
    public function setItemsid($itemsid)
    {
        $this->itemsid = $itemsid;
    }

    /**
     * @return int
     */
    public function getContainerid()
    {
        return $this->containerid;
    }

    /**
     * @param int $containerid
     */
    public function setContainerid($containerid)
    {
        $this->containerid = $containerid;
    }

    /**
     * @return int
     */
    public function getCharacterdid()
    {
        return $this->characterdid;
    }

    /**
     * @param int $characterdid
     */
    public function setCharacterdid($characterdid)
    {
        $this->characterdid = $characterdid;
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


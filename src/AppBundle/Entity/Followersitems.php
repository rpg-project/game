<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Followersitems
 *
 * @ORM\Table(name="FollowersItems", indexes={@ORM\Index(name="followerId_idx", columns={"FollowersId"}), @ORM\Index(name="itemId_idx", columns={"ItemId"})})
 * @ORM\Entity
 */
class Followersitems
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ItemId", type="integer", nullable=true)
     */
    private $itemid;

    /**
     * @var integer
     *
     * @ORM\Column(name="FollowersId", type="integer", nullable=true)
     */
    private $followersid;

    /**
     * @var integer
     *
     * @ORM\Column(name="Equiped", type="integer", nullable=true)
     */
    private $equiped;

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
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * @param int $itemid
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;
    }

    /**
     * @return int
     */
    public function getFollowersid()
    {
        return $this->followersid;
    }

    /**
     * @param int $followersid
     */
    public function setFollowersid($followersid)
    {
        $this->followersid = $followersid;
    }

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


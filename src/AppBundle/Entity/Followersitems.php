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
     * @var \AppBundle\Entity\Items
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ItemId", referencedColumnName="id")
     * })
     */
    private $itemid;

    /**
     * @var \AppBundle\Entity\Followers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Followers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FollowersId", referencedColumnName="id")
     * })
     */
    private $followersid;

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

    /**
     * @return Followers
     */
    public function getFollowersid()
    {
        return $this->followersid;
    }

    /**
     * @param Followers $followersid
     */
    public function setFollowersid($followersid)
    {
        $this->followersid = $followersid;
    }


}


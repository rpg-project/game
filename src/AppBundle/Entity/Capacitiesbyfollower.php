<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitiesbyfollower
 *
 * @ORM\Table(name="capacitiesByFollower", indexes={@ORM\Index(name="followerId_idx", columns={"followerId"}), @ORM\Index(name="capacityId_idx", columns={"capacityId"})})
 * @ORM\Entity
 */
class Capacitiesbyfollower
{
    /**
     * @var integer
     *
     * @ORM\Column(name="followerId", type="integer", nullable=true)
     */
    private $followerid;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacityId", type="integer", nullable=true)
     */
    private $capacityid;

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
    public function getFollowerid()
    {
        return $this->followerid;
    }

    /**
     * @param int $followerid
     */
    public function setFollowerid($followerid)
    {
        $this->followerid = $followerid;
    }

    /**
     * @return int
     */
    public function getCapacityid()
    {
        return $this->capacityid;
    }

    /**
     * @param int $capacityid
     */
    public function setCapacityid($capacityid)
    {
        $this->capacityid = $capacityid;
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


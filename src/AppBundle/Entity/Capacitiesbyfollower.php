<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Capacitiesbyfollower
 *
 * @ORM\Table(name="capacitiesByFollower", indexes={@ORM\Index(name="followerId_idx", columns={"followerId"}), @ORM\Index(name="capacityId_idx", columns={"capacityId"}), @ORM\Index(name="caracterId_idx", columns={"characterId"})})
 * @ORM\Entity
 */
class Capacitiesbyfollower
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
     * @var \AppBundle\Entity\Followers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Followers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="followerId", referencedColumnName="id")
     * })
     */
    private $followerid;

    /**
     * @var \AppBundle\Entity\Characters
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Characters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="characterId", referencedColumnName="id")
     * })
     */
    private $characterid;

    /**
     * @var \AppBundle\Entity\Capacities
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Capacities")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="capacityId", referencedColumnName="id")
     * })
     */
    private $capacityid;

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
     * @return Followers
     */
    public function getFollowerid()
    {
        return $this->followerid;
    }

    /**
     * @param Followers $followerid
     */
    public function setFollowerid($followerid)
    {
        $this->followerid = $followerid;
    }

    /**
     * @return Characters
     */
    public function getCharacterid()
    {
        return $this->characterid;
    }

    /**
     * @param Characters $characterid
     */
    public function setCharacterid($characterid)
    {
        $this->characterid = $characterid;
    }

    /**
     * @return Capacities
     */
    public function getCapacityid()
    {
        return $this->capacityid;
    }

    /**
     * @param Capacities $capacityid
     */
    public function setCapacityid($capacityid)
    {
        $this->capacityid = $capacityid;
    }


}


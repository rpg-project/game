<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Followersbycharacter
 *
 * @ORM\Table(name="followersByCharacter", indexes={@ORM\Index(name="characterId_idx", columns={"characterId"}), @ORM\Index(name="followerId_idx", columns={"followerId"})})
 * @ORM\Entity
 */
class Followersbycharacter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="teamed", type="integer", nullable=true)
     */
    private $teamed;

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
     * @return int
     */
    public function getTeamed()
    {
        return $this->teamed;
    }

    /**
     * @param int $teamed
     */
    public function setTeamed($teamed)
    {
        $this->teamed = $teamed;
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


}


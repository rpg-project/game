<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team", indexes={@ORM\Index(name="characterId_idx", columns={"character_id"}), @ORM\Index(name="mateId_idx", columns={"team_mate_id"})})
 * @ORM\Entity
 */
class Team
{
    /**
     * @var integer
     *
     * @ORM\Column(name="place", type="integer", nullable=true)
     */
    private $place;

    /**
     * @var integer
     *
     * @ORM\Column(name="avalaible", type="integer", nullable=true)
     */
    private $avalaible;

    /**
     * @var integer
     *
     * @ORM\Column(name="team_mate_id", type="integer", nullable=true)
     */
    private $teamMateId;

    /**
     * @var integer
     *
     * @ORM\Column(name="character_id", type="integer", nullable=true)
     */
    private $characterId;

    /**
     * @var integer
     *
     * @ORM\Column(name="follower_id", type="integer", nullable=true)
     */
    private $followerId;

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
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param int $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return int
     */
    public function getTeamMateId()
    {
        return $this->teamMateId;
    }

    /**
     * @param int $teamMateId
     */
    public function setTeamMateId($teamMateId)
    {
        $this->teamMateId = $teamMateId;
    }

    /**
     * @return int
     */
    public function getCharacterId()
    {
        return $this->characterId;
    }

    /**
     * @param int $characterId
     */
    public function setCharacterId($characterId)
    {
        $this->characterId = $characterId;
    }

    /**
     * @return int
     */
    public function getFollowerId()
    {
        return $this->followerId;
    }

    /**
     * @param int $followerId
     */
    public function setFollowerId($followerId)
    {
        $this->followerId = $followerId;
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
     * @return int
     */
    public function getAvalaible()
    {
        return $this->avalaible;
    }

    /**
     * @param int $avalaible
     */
    public function setAvalaible($avalaible)
    {
        $this->avalaible = $avalaible;
    }

}


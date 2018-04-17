<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team", indexes={@ORM\Index(name="characterId_idx", columns={"character_id"}), @ORM\Index(name="mate_idx", columns={"team_mate_id"})})
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Followersbycharacter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Followersbycharacter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="team_mate_id", referencedColumnName="id")
     * })
     */
    private $teamMate;

    /**
     * @var \AppBundle\Entity\Characters
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Characters")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="character_id", referencedColumnName="id")
     * })
     */
    private $character;

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
     * @return Followersbycharacter
     */
    public function getTeamMate()
    {
        return $this->teamMate;
    }

    /**
     * @param Followersbycharacter $teamMate
     */
    public function setTeamMate($teamMate)
    {
        $this->teamMate = $teamMate;
    }

    /**
     * @return Characters
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * @param Characters $character
     */
    public function setCharacter($character)
    {
        $this->character = $character;
    }


}


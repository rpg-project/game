<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Team
 *
 * @ORM\Table(name="team")
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
     * @ORM\Column(name="team_mate_id", type="integer", nullable=true)
     */
    private $teamMateId;

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


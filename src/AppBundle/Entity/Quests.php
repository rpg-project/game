<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quests
 *
 * @ORM\Table(name="quests", indexes={@ORM\Index(name="place_idx", columns={"placeId"}), @ORM\Index(name="pId_idx", columns={"placeId"})})
 * @ORM\Entity
 */
class Quests
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=45, nullable=true)
     */
    public $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    public $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="team", type="integer", nullable=true)
     */
    public $team;

    /**
     * @var integer
     *
     * @ORM\Column(name="chapter", type="integer", nullable=true)
     */
    public $chapter;

    /**
     * @var integer
     *
     * @ORM\Column(name="difficulty_max", type="integer", nullable=false)
     */
    public $difficultyMax;

    /**
     * @var integer
     *
     * @ORM\Column(name="difficulty_min", type="integer", nullable=false)
     */
    public $difficultyMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="glory_reward", type="integer", nullable=true)
     */
    public $gloryReward;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold_reward", type="integer", nullable=true)
     */
    public $goldReward;

    /**
     * @var integer
     *
     * @ORM\Column(name="xp_reward", type="integer", nullable=true)
     */
    public $xpReward;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_law", type="integer", nullable=true)
     */
    public $bonusLaw;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_chaos", type="integer", nullable=true)
     */
    public $bonusChaos;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_good", type="integer", nullable=true)
     */
    public $bonusGood;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_evil", type="integer", nullable=true)
     */
    public $bonusEvil;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_min", type="integer", nullable=true)
     */
    public $levelMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="starting_zone", type="integer", nullable=false)
     */
    public $startingZone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_info", type="datetime", nullable=true)
     */
    public $dateInfo;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var \AppBundle\Entity\Places
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Places")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="placeId", referencedColumnName="id")
     * })
     */
    public $placeid;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * @param int $team
     */
    public function setTeam($team)
    {
        $this->team = $team;
    }

    /**
     * @return int
     */
    public function getChapter()
    {
        return $this->chapter;
    }

    /**
     * @param int $chapter
     */
    public function setChapter($chapter)
    {
        $this->chapter = $chapter;
    }

    /**
     * @return int
     */
    public function getDifficultyMax()
    {
        return $this->difficultyMax;
    }

    /**
     * @param int $difficultyMax
     */
    public function setDifficultyMax($difficultyMax)
    {
        $this->difficultyMax = $difficultyMax;
    }

    /**
     * @return int
     */
    public function getDifficultyMin()
    {
        return $this->difficultyMin;
    }

    /**
     * @param int $difficultyMin
     */
    public function setDifficultyMin($difficultyMin)
    {
        $this->difficultyMin = $difficultyMin;
    }

    /**
     * @return int
     */
    public function getGloryReward()
    {
        return $this->gloryReward;
    }

    /**
     * @param int $gloryReward
     */
    public function setGloryReward($gloryReward)
    {
        $this->gloryReward = $gloryReward;
    }

    /**
     * @return int
     */
    public function getGoldReward()
    {
        return $this->goldReward;
    }

    /**
     * @param int $goldReward
     */
    public function setGoldReward($goldReward)
    {
        $this->goldReward = $goldReward;
    }

    /**
     * @return int
     */
    public function getXpReward()
    {
        return $this->xpReward;
    }

    /**
     * @param int $xpReward
     */
    public function setXpReward($xpReward)
    {
        $this->xpReward = $xpReward;
    }

    /**
     * @return int
     */
    public function getBonusLaw()
    {
        return $this->bonusLaw;
    }

    /**
     * @param int $bonusLaw
     */
    public function setBonusLaw($bonusLaw)
    {
        $this->bonusLaw = $bonusLaw;
    }

    /**
     * @return int
     */
    public function getBonusChaos()
    {
        return $this->bonusChaos;
    }

    /**
     * @param int $bonusChaos
     */
    public function setBonusChaos($bonusChaos)
    {
        $this->bonusChaos = $bonusChaos;
    }

    /**
     * @return int
     */
    public function getBonusGood()
    {
        return $this->bonusGood;
    }

    /**
     * @param int $bonusGood
     */
    public function setBonusGood($bonusGood)
    {
        $this->bonusGood = $bonusGood;
    }

    /**
     * @return int
     */
    public function getBonusEvil()
    {
        return $this->bonusEvil;
    }

    /**
     * @param int $bonusEvil
     */
    public function setBonusEvil($bonusEvil)
    {
        $this->bonusEvil = $bonusEvil;
    }

    /**
     * @return int
     */
    public function getLevelMin()
    {
        return $this->levelMin;
    }

    /**
     * @param int $levelMin
     */
    public function setLevelMin($levelMin)
    {
        $this->levelMin = $levelMin;
    }

    /**
     * @return int
     */
    public function getStartingZone()
    {
        return $this->startingZone;
    }

    /**
     * @param int $startingZone
     */
    public function setStartingZone($startingZone)
    {
        $this->startingZone = $startingZone;
    }

    /**
     * @return \DateTime
     */
    public function getDateInfo()
    {
        return $this->dateInfo;
    }

    /**
     * @param \DateTime $dateInfo
     */
    public function setDateInfo($dateInfo)
    {
        $this->dateInfo = $dateInfo;
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
     * @return Places
     */
    public function getPlaceid()
    {
        return $this->placeid;
    }

    /**
     * @param Places $placeid
     */
    public function setPlaceid($placeid)
    {
        $this->placeid = $placeid;
    }


}


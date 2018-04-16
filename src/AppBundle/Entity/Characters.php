<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Characters
 *
 * @ORM\Table(name="characters", indexes={@ORM\Index(name="userId_idx", columns={"userId"})})
 * @ORM\Entity
 */
class Characters
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="gold", type="integer", nullable=true)
     */
    private $gold;

    /**
     * @var integer
     *
     * @ORM\Column(name="health", type="integer", nullable=true)
     */
    private $health;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_health", type="integer", nullable=true)
     */
    private $maxHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="stamina", type="integer", nullable=true)
     */
    private $stamina;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_stamina", type="integer", nullable=true)
     */
    private $maxStamina;

    /**
     * @var integer
     *
     * @ORM\Column(name="energy", type="integer", nullable=true)
     */
    private $energy;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_energy", type="integer", nullable=true)
     */
    private $maxEnergy;

    /**
     * @var integer
     *
     * @ORM\Column(name="move", type="integer", nullable=true)
     */
    private $move;

    /**
     * @var integer
     *
     * @ORM\Column(name="quickness", type="integer", nullable=true)
     */
    private $quickness;

    /**
     * @var integer
     *
     * @ORM\Column(name="attack", type="integer", nullable=true)
     */
    private $attack;

    /**
     * @var integer
     *
     * @ORM\Column(name="defense", type="integer", nullable=true)
     */
    private $defense;

    /**
     * @var integer
     *
     * @ORM\Column(name="critical", type="integer", nullable=true)
     */
    private $critical;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="xp", type="integer", nullable=true)
     */
    private $xp;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=100, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="location", type="integer", nullable=true)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="repop_location", type="integer", nullable=true)
     */
    private $repopLocation;

    /**
     * @var integer
     *
     * @ORM\Column(name="glory", type="integer", nullable=true)
     */
    private $glory;

    /**
     * @var integer
     *
     * @ORM\Column(name="faith", type="integer", nullable=true)
     */
    private $faith;

    /**
     * @var integer
     *
     * @ORM\Column(name="craft_skill", type="integer", nullable=true)
     */
    private $craftSkill;

    /**
     * @var integer
     *
     * @ORM\Column(name="law", type="integer", nullable=true)
     */
    private $law;

    /**
     * @var integer
     *
     * @ORM\Column(name="chaos", type="integer", nullable=true)
     */
    private $chaos;

    /**
     * @var integer
     *
     * @ORM\Column(name="good", type="integer", nullable=true)
     */
    private $good;

    /**
     * @var integer
     *
     * @ORM\Column(name="evil", type="integer", nullable=true)
     */
    private $evil;

    /**
     * @var integer
     *
     * @ORM\Column(name="war_rank", type="integer", nullable=true)
     */
    private $warRank;

    /**
     * @var integer
     *
     * @ORM\Column(name="arena_rank", type="integer", nullable=true)
     */
    private $arenaRank;

    /**
     * @var integer
     *
     * @ORM\Column(name="box_size", type="integer", nullable=true)
     */
    private $boxSize;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_box_size", type="integer", nullable=true)
     */
    private $maxBoxSize;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @var integer
     *
     * @ORM\Column(name="title", type="integer", nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="max_bag_capacity", type="integer", nullable=true)
     */
    private $maxBagCapacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userId", referencedColumnName="id")
     * })
     */
    private $userid;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getGold()
    {
        return $this->gold;
    }

    /**
     * @param int $gold
     */
    public function setGold($gold)
    {
        $this->gold = $gold;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @param int $health
     */
    public function setHealth($health)
    {
        $this->health = $health;
    }

    /**
     * @return int
     */
    public function getMaxHealth()
    {
        return $this->maxHealth;
    }

    /**
     * @param int $maxHealth
     */
    public function setMaxHealth($maxHealth)
    {
        $this->maxHealth = $maxHealth;
    }

    /**
     * @return int
     */
    public function getStamina()
    {
        return $this->stamina;
    }

    /**
     * @param int $stamina
     */
    public function setStamina($stamina)
    {
        $this->stamina = $stamina;
    }

    /**
     * @return int
     */
    public function getMaxStamina()
    {
        return $this->maxStamina;
    }

    /**
     * @param int $maxStamina
     */
    public function setMaxStamina($maxStamina)
    {
        $this->maxStamina = $maxStamina;
    }

    /**
     * @return int
     */
    public function getEnergy()
    {
        return $this->energy;
    }

    /**
     * @param int $energy
     */
    public function setEnergy($energy)
    {
        $this->energy = $energy;
    }

    /**
     * @return int
     */
    public function getMaxEnergy()
    {
        return $this->maxEnergy;
    }

    /**
     * @param int $maxEnergy
     */
    public function setMaxEnergy($maxEnergy)
    {
        $this->maxEnergy = $maxEnergy;
    }

    /**
     * @return int
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * @param int $move
     */
    public function setMove($move)
    {
        $this->move = $move;
    }

    /**
     * @return int
     */
    public function getQuickness()
    {
        return $this->quickness;
    }

    /**
     * @param int $quickness
     */
    public function setQuickness($quickness)
    {
        $this->quickness = $quickness;
    }

    /**
     * @return int
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * @param int $attack
     */
    public function setAttack($attack)
    {
        $this->attack = $attack;
    }

    /**
     * @return int
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * @param int $defense
     */
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * @return int
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * @param int $critical
     */
    public function setCritical($critical)
    {
        $this->critical = $critical;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return int
     */
    public function getXp()
    {
        return $this->xp;
    }

    /**
     * @param int $xp
     */
    public function setXp($xp)
    {
        $this->xp = $xp;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param int $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return int
     */
    public function getRepopLocation()
    {
        return $this->repopLocation;
    }

    /**
     * @param int $repopLocation
     */
    public function setRepopLocation($repopLocation)
    {
        $this->repopLocation = $repopLocation;
    }

    /**
     * @return int
     */
    public function getGlory()
    {
        return $this->glory;
    }

    /**
     * @param int $glory
     */
    public function setGlory($glory)
    {
        $this->glory = $glory;
    }

    /**
     * @return int
     */
    public function getFaith()
    {
        return $this->faith;
    }

    /**
     * @param int $faith
     */
    public function setFaith($faith)
    {
        $this->faith = $faith;
    }

    /**
     * @return int
     */
    public function getCraftSkill()
    {
        return $this->craftSkill;
    }

    /**
     * @param int $craftSkill
     */
    public function setCraftSkill($craftSkill)
    {
        $this->craftSkill = $craftSkill;
    }

    /**
     * @return int
     */
    public function getLaw()
    {
        return $this->law;
    }

    /**
     * @param int $law
     */
    public function setLaw($law)
    {
        $this->law = $law;
    }

    /**
     * @return int
     */
    public function getChaos()
    {
        return $this->chaos;
    }

    /**
     * @param int $chaos
     */
    public function setChaos($chaos)
    {
        $this->chaos = $chaos;
    }

    /**
     * @return int
     */
    public function getGood()
    {
        return $this->good;
    }

    /**
     * @param int $good
     */
    public function setGood($good)
    {
        $this->good = $good;
    }

    /**
     * @return int
     */
    public function getEvil()
    {
        return $this->evil;
    }

    /**
     * @param int $evil
     */
    public function setEvil($evil)
    {
        $this->evil = $evil;
    }

    /**
     * @return int
     */
    public function getWarRank()
    {
        return $this->warRank;
    }

    /**
     * @param int $warRank
     */
    public function setWarRank($warRank)
    {
        $this->warRank = $warRank;
    }

    /**
     * @return int
     */
    public function getArenaRank()
    {
        return $this->arenaRank;
    }

    /**
     * @param int $arenaRank
     */
    public function setArenaRank($arenaRank)
    {
        $this->arenaRank = $arenaRank;
    }

    /**
     * @return int
     */
    public function getBoxSize()
    {
        return $this->boxSize;
    }

    /**
     * @param int $boxSize
     */
    public function setBoxSize($boxSize)
    {
        $this->boxSize = $boxSize;
    }

    /**
     * @return int
     */
    public function getMaxBoxSize()
    {
        return $this->maxBoxSize;
    }

    /**
     * @param int $maxBoxSize
     */
    public function setMaxBoxSize($maxBoxSize)
    {
        $this->maxBoxSize = $maxBoxSize;
    }

    /**
     * @return \DateTime
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * @param \DateTime $lastLogin
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;
    }

    /**
     * @return int
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param int $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getMaxBagCapacity()
    {
        return $this->maxBagCapacity;
    }

    /**
     * @param int $maxBagCapacity
     */
    public function setMaxBagCapacity($maxBagCapacity)
    {
        $this->maxBagCapacity = $maxBagCapacity;
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
     * @return Users
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param Users $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }


}


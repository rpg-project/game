<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Followers
 *
 * @ORM\Table(name="followers", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Followers
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
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

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
     * @ORM\Column(name="image", type="string", length=50, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_min", type="integer", nullable=true)
     */
    private $levelMin;

    /**
     * @var string
     *
     * @ORM\Column(name="rate_label", type="string", length=45, nullable=true)
     */
    private $rateLabel;

    /**
     * @var integer
     *
     * @ORM\Column(name="pop_rate", type="integer", nullable=true)
     */
    private $popRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_back", type="integer", nullable=true)
     */
    private $priceBack;

    /**
     * @var integer
     *
     * @ORM\Column(name="goal", type="integer", nullable=true)
     */
    private $goal;

    /**
     * @var integer
     *
     * @ORM\Column(name="unique_rate", type="integer", nullable=true)
     */
    private $uniqueRate;

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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return string
     */
    public function getRateLabel()
    {
        return $this->rateLabel;
    }

    /**
     * @param string $rateLabel
     */
    public function setRateLabel($rateLabel)
    {
        $this->rateLabel = $rateLabel;
    }

    /**
     * @return int
     */
    public function getPopRate()
    {
        return $this->popRate;
    }

    /**
     * @param int $popRate
     */
    public function setPopRate($popRate)
    {
        $this->popRate = $popRate;
    }

    /**
     * @return int
     */
    public function getPriceBack()
    {
        return $this->priceBack;
    }

    /**
     * @param int $priceBack
     */
    public function setPriceBack($priceBack)
    {
        $this->priceBack = $priceBack;
    }

    /**
     * @return int
     */
    public function getGoal()
    {
        return $this->goal;
    }

    /**
     * @param int $goal
     */
    public function setGoal($goal)
    {
        $this->goal = $goal;
    }

    /**
     * @return int
     */
    public function getUniqueRate()
    {
        return $this->uniqueRate;
    }

    /**
     * @param int $uniqueRate
     */
    public function setUniqueRate($uniqueRate)
    {
        $this->uniqueRate = $uniqueRate;
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


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 *
 * @ORM\Table(name="items")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\ItemsRepository")
 */
class Items
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    public $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    public $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    public $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="level_min", type="integer", nullable=true)
     */
    public $levelMin;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", length=45, nullable=true)
     */
    public $quality;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_move", type="integer", nullable=true)
     */
    public $bonusMove;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_quickness", type="integer", nullable=true)
     */
    public $bonusQuickness;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_attack", type="integer", nullable=true)
     */
    public $bonusAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_defense", type="integer", nullable=true)
     */
    public $bonusDefense;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_critical", type="integer", nullable=true)
     */
    public $bonusCritical;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_health", type="integer", nullable=true)
     */
    public $bonusHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_energy", type="integer", nullable=true)
     */
    public $bonusEnergy;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer", nullable=true)
     */
    public $capacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_buy", type="integer", nullable=true)
     */
    public $priceBuy;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_sell", type="integer", nullable=true)
     */
    public $priceSell;

    /**
     * @var integer
     *
     * @ORM\Column(name="open", type="integer", nullable=true)
     */
    public $open;

    /**
     * @var integer
     *
     * @ORM\Column(name="container", type="integer", nullable=true)
     */
    public $container;

    /**
     * @var integer
     *
     * @ORM\Column(name="container_space", type="integer", nullable=true)
     */
    public $containerSpace;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=50, nullable=true)
     */
    public $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="weigth", type="integer", nullable=true)
     */
    public $weigth;

    /**
     * @var integer
     *
     * @ORM\Column(name="pop_rate", type="integer", nullable=true)
     */
    public $popRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="pop_zone", type="integer", nullable=true)
     */
    public $popZone;

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
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @param string $quality
     */
    public function setQuality($quality)
    {
        $this->quality = $quality;
    }

    /**
     * @return int
     */
    public function getBonusMove()
    {
        return $this->bonusMove;
    }

    /**
     * @param int $bonusMove
     */
    public function setBonusMove($bonusMove)
    {
        $this->bonusMove = $bonusMove;
    }

    /**
     * @return int
     */
    public function getBonusQuickness()
    {
        return $this->bonusQuickness;
    }

    /**
     * @param int $bonusQuickness
     */
    public function setBonusQuickness($bonusQuickness)
    {
        $this->bonusQuickness = $bonusQuickness;
    }

    /**
     * @return int
     */
    public function getBonusAttack()
    {
        return $this->bonusAttack;
    }

    /**
     * @param int $bonusAttack
     */
    public function setBonusAttack($bonusAttack)
    {
        $this->bonusAttack = $bonusAttack;
    }

    /**
     * @return int
     */
    public function getBonusDefense()
    {
        return $this->bonusDefense;
    }

    /**
     * @param int $bonusDefense
     */
    public function setBonusDefense($bonusDefense)
    {
        $this->bonusDefense = $bonusDefense;
    }

    /**
     * @return int
     */
    public function getBonusCritical()
    {
        return $this->bonusCritical;
    }

    /**
     * @param int $bonusCritical
     */
    public function setBonusCritical($bonusCritical)
    {
        $this->bonusCritical = $bonusCritical;
    }

    /**
     * @return int
     */
    public function getBonusHealth()
    {
        return $this->bonusHealth;
    }

    /**
     * @param int $bonusHealth
     */
    public function setBonusHealth($bonusHealth)
    {
        $this->bonusHealth = $bonusHealth;
    }

    /**
     * @return int
     */
    public function getBonusEnergy()
    {
        return $this->bonusEnergy;
    }

    /**
     * @param int $bonusEnergy
     */
    public function setBonusEnergy($bonusEnergy)
    {
        $this->bonusEnergy = $bonusEnergy;
    }

    /**
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * @param int $capacity
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @return int
     */
    public function getPriceBuy()
    {
        return $this->priceBuy;
    }

    /**
     * @param int $priceBuy
     */
    public function setPriceBuy($priceBuy)
    {
        $this->priceBuy = $priceBuy;
    }

    /**
     * @return int
     */
    public function getPriceSell()
    {
        return $this->priceSell;
    }

    /**
     * @param int $priceSell
     */
    public function setPriceSell($priceSell)
    {
        $this->priceSell = $priceSell;
    }

    /**
     * @return int
     */
    public function getOpen()
    {
        return $this->open;
    }

    /**
     * @param int $open
     */
    public function setOpen($open)
    {
        $this->open = $open;
    }

    /**
     * @return int
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param int $container
     */
    public function setContainer($container)
    {
        $this->container = $container;
    }

    /**
     * @return int
     */
    public function getContainerSpace()
    {
        return $this->containerSpace;
    }

    /**
     * @param int $containerSpace
     */
    public function setContainerSpace($containerSpace)
    {
        $this->containerSpace = $containerSpace;
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
    public function getWeigth()
    {
        return $this->weigth;
    }

    /**
     * @param int $weigth
     */
    public function setWeigth($weigth)
    {
        $this->weigth = $weigth;
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
    public function getPopZone()
    {
        return $this->popZone;
    }

    /**
     * @param int $popZone
     */
    public function setPopZone($popZone)
    {
        $this->popZone = $popZone;
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


}


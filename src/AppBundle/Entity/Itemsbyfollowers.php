<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itemsbyfollowers
 *
 * @ORM\Table(name="itemsByFollowers", indexes={@ORM\Index(name="followerId_idx", columns={"followerId"}), @ORM\Index(name="itemId_idx", columns={"itemId"})})
 * @ORM\Entity
 */
class Itemsbyfollowers
{
    /**
     * @var integer
     *
     * @ORM\Column(name="equiped", type="integer", nullable=true)
     */
    private $equiped;

    /**
     * @var integer
     *
     * @ORM\Column(name="contained", type="integer", nullable=true)
     */
    private $contained;

    /**
     * @var integer
     *
     * @ORM\Column(name="container_space", type="integer", nullable=true)
     */
    private $containerSpace;

    /**
     * @var integer
     *
     * @ORM\Column(name="containerId", type="integer", nullable=true)
     */
    private $containerid;

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
     * @ORM\Column(name="level_min", type="integer", nullable=true)
     */
    private $levelMin;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=true)
     */
    private $level;

    /**
     * @var string
     *
     * @ORM\Column(name="quality", type="string", length=45, nullable=true)
     */
    private $quality;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_move", type="integer", nullable=true)
     */
    private $bonusMove;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_quickness", type="integer", nullable=true)
     */
    private $bonusQuickness;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_attack", type="integer", nullable=true)
     */
    private $bonusAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_defense", type="integer", nullable=true)
     */
    private $bonusDefense;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_health", type="integer", nullable=true)
     */
    private $bonusHealth;

    /**
     * @var integer
     *
     * @ORM\Column(name="bonus_energy", type="integer", nullable=true)
     */
    private $bonusEnergy;

    /**
     * @var integer
     *
     * @ORM\Column(name="capacity", type="integer", nullable=true)
     */
    private $capacity;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_buy", type="integer", nullable=true)
     */
    private $priceBuy;

    /**
     * @var integer
     *
     * @ORM\Column(name="price_sell", type="integer", nullable=true)
     */
    private $priceSell;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=50, nullable=true)
     */
    private $image;

    /**
     * @var integer
     *
     * @ORM\Column(name="open", type="integer", nullable=true)
     */
    private $open;

    /**
     * @var integer
     *
     * @ORM\Column(name="weigth", type="integer", nullable=true)
     */
    private $weigth;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Items
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="itemId", referencedColumnName="id")
     * })
     */
    private $itemid;

    /**
     * @var \AppBundle\Entity\Followersbycharacter
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Followersbycharacter")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="followerId", referencedColumnName="id")
     * })
     */
    private $followerid;

    /**
     * @return int
     */
    public function getEquiped()
    {
        return $this->equiped;
    }

    /**
     * @param int $equiped
     */
    public function setEquiped($equiped)
    {
        $this->equiped = $equiped;
    }

    /**
     * @return int
     */
    public function getContained()
    {
        return $this->contained;
    }

    /**
     * @param int $contained
     */
    public function setContained($contained)
    {
        $this->contained = $contained;
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
     * @return int
     */
    public function getContainerid()
    {
        return $this->containerid;
    }

    /**
     * @param int $containerid
     */
    public function setContainerid($containerid)
    {
        $this->containerid = $containerid;
    }

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
     * @return Items
     */
    public function getItemid()
    {
        return $this->itemid;
    }

    /**
     * @param Items $itemid
     */
    public function setItemid($itemid)
    {
        $this->itemid = $itemid;
    }

    /**
     * @return Followersbycharacter
     */
    public function getFollowerid()
    {
        return $this->followerid;
    }

    /**
     * @param Followersbycharacter $followerid
     */
    public function setFollowerid($followerid)
    {
        $this->followerid = $followerid;
    }


}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descriptionfollowers
 *
 * @ORM\Table(name="descriptionFollowers")
 * @ORM\Entity
 */
class Descriptionfollowers
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_description", type="date", nullable=false)
     */
    private $dateDescription;

    /**
     * @var integer
     *
     * @ORM\Column(name="followerId", type="integer", nullable=false)
     */
    private $followerid;

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
     * @return \DateTime
     */
    public function getDateDescription()
    {
        return $this->dateDescription;
    }

    /**
     * @param \DateTime $dateDescription
     */
    public function setDateDescription($dateDescription)
    {
        $this->dateDescription = $dateDescription;
    }

    /**
     * @return int
     */
    public function getFollowerid()
    {
        return $this->followerid;
    }

    /**
     * @param int $followerid
     */
    public function setFollowerid($followerid)
    {
        $this->followerid = $followerid;
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


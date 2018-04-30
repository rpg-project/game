<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questsbycharacter
 *
 * @ORM\Table(name="questsByCharacter", indexes={@ORM\Index(name="cid_idx", columns={"characterId"}), @ORM\Index(name="qid_idx", columns={"questId"})})
 * @ORM\Entity
 */
class Questsbycharacter
{
    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Quests
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Quests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="questId", referencedColumnName="id")
     * })
     */
    private $questid;

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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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
     * @return Quests
     */
    public function getQuestid()
    {
        return $this->questid;
    }

    /**
     * @param Quests $questid
     */
    public function setQuestid($questid)
    {
        $this->questid = $questid;
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


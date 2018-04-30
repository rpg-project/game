<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Itemsbyquest
 *
 * @ORM\Table(name="itemsByQuest", indexes={@ORM\Index(name="questid_idx", columns={"questId"}), @ORM\Index(name="itemid_idx", columns={"itemId"})})
 * @ORM\Entity
 */
class Itemsbyquest
{
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
     * @var \AppBundle\Entity\Items
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Items")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="itemId", referencedColumnName="id")
     * })
     */
    private $itemid;

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


}


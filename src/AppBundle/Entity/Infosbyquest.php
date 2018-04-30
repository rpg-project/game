<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infosbyquest
 *
 * @ORM\Table(name="infosByQuest", indexes={@ORM\Index(name="infid_idx", columns={"infosId"}), @ORM\Index(name="questid_idx", columns={"questId"})})
 * @ORM\Entity
 */
class Infosbyquest
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
     * @var \AppBundle\Entity\Infos
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Infos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="infosId", referencedColumnName="id")
     * })
     */
    private $infosid;

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
     * @return Infos
     */
    public function getInfosid()
    {
        return $this->infosid;
    }

    /**
     * @param Infos $infosid
     */
    public function setInfosid($infosid)
    {
        $this->infosid = $infosid;
    }


}


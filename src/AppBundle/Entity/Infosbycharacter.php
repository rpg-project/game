<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Infosbycharacter
 *
 * @ORM\Table(name="infosByCharacter", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="characId_idx", columns={"characterId"}), @ORM\Index(name="infoId_idx", columns={"infoId"})})
 * @ORM\Entity
 */
class Infosbycharacter
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
     * @var \AppBundle\Entity\Infos
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Infos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="infoId", referencedColumnName="id")
     * })
     */
    private $infoid;

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
     * @return Infos
     */
    public function getInfoid()
    {
        return $this->infoid;
    }

    /**
     * @param Infos $infoid
     */
    public function setInfoid($infoid)
    {
        $this->infoid = $infoid;
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


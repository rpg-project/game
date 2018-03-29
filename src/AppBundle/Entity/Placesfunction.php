<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Placesfunction
 *
 * @ORM\Table(name="placesFunction")
 * @ORM\Entity
 */
class Placesfunction
{
    /**
     * @var string
     *
     * @ORM\Column(name="function", type="string", length=50, nullable=true)
     */
    private $function;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeFunction", type="integer", nullable=true)
     */
    private $typefunction;

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
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param string $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
    }


}


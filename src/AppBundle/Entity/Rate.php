<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rate
 *
 * @ORM\Table(name="rate")
 * @ORM\Entity
 */
class Rate
{
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
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

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


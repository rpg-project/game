<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zone
 *
 */
class Zone
{
    /**
     * @var string
     */
    public $mapName;

    /**
     * @var string
     */
    public $questId;

    /**
     * @var string
     */
    public $width;

    /**
     * @var string
     */
    public $height;

    /**
     * @return string
     */
    public function getMapName()
    {
        return $this->mapName;
    }

    /**
     * @param string $mapName
     */
    public function setMapName($mapName)
    {
        $this->mapName = $mapName;
    }

    /**
     * @return string
     */
    public function getQuestid()
    {
        return $this->questId;
    }

    /**
     * @param string $questId
     */
    public function setQuestid($questId)
    {
        $this->questId = $questId;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }


}


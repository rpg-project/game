<?php

namespace AppBundle\Entity;

/**
 * Class dictionary
 * @package AppBundle\Dictionary
 */
class Dictionary
{

    /** @var array */
    private static $goal = array(
        'Gloire' => 0,
        'Loi' => 1,
        'Loi et Bien' => 2,
        'Or' => 3,
        'Chaos' => 4,
    );

    /** @var array */
    private static $typeItem = array(
            'Arme' => 1,
            'Contenaire' => 2,
            'Consommable' => 3,
            'Armure' => 4,
    );

    /** @var array */
    private static $rate = array(
        'SSR' => 'SSR',
        'SR' => 'SR',
        'R' => 'R',
        'N' => 'N',
        'C' => 'C',
        'XR' => 'XR',
    );

    /** @var array */
    private static $popRate = array(
        'SSR' => 5,
        'SR' => 10,
        'R' => 25,
        'N' => 35,
        'C' => 50,
        'XR' => 3,
    );

    /** @var array */
    private static $priceBack = array(
        'SSR' => 5,
        'SR' => 4,
        'R' => 3,
        'N' => 2,
        'C' => 1,
        'XR' => 10,
    );

    /** @var array */
    private static $typePlace = array(
        'Auberge' => 1,
        'Autorité' => 2,
        'Marchand' => 3,
    );

    /** @var array */
    private static $typeLabelInfo = array(
        'Information' => 1,
        'Tutorial' => 2,
        'Information Globale' => 3,
        'Trigger' => 4,
    );

    /** @var array */
    private static $typeInfo = array(
        1 => 'Information',
        2 => 'Tutorial',
        3 => 'Information Globale',
        4 => 'Trigger'
    );

    /** @var array */
    private static $typeLabelMonster = array(
        'Agressive' => 1, //attaque à vue
        'Inoffensive' => 2, //n'attaque jamais
        'Defensive' => 3, //attaque si attaqué
        'Fleeing' => 4, //fui à vue
        'Boss' => 5,
    );

    /** @var array */
    private static $typeMonster = array(
        1 => 'Agressive', //attaque à vue
        2 => 'Inoffensive', //n'attaque jamais
        3 => 'Defensive', //attaque si attaqué
        4 => 'Fleeing', //fui à vue
        5 => 'Boss',
    );

    /** @var array */
    private static $LabelDifficulties = array(
        'Easy' => 1,
        'Moderate' => 2,
        'Hard' => 3,
        'Very Hard' => 4,
        'Impossible' => 5,
    );

    /** @var array */
    private static $difficulties = array(
        1 => 'Easy',
        2 => 'Moderate',
        3 => 'Hard',
        4 => 'Very Hard',
        5 => 'Impossible',
    );

    /** @var array */
    private static $LabelDecoration = array(
        'none' => null,
        'arbre' => array('image' => 'arbre.jpg', 'obstacle' => 1),
        'chemin' => array('image' => 'chemin.jpg', 'obstacle' => 0),
        'herbe' => array('image' => 'herbe.png', 'obstacle' => 0),
        'arbre sombre' => array('image' => 'arbre_sombre.png', 'obstacle' => 1),
        'chemin noir' => array('image' => 'chemin_noir.png', 'obstacle' => 0),
        'souche' => array('image' => 'souche.jpeg', 'obstacle' => 0),
        'hutte' => array('image' => 'hutte.jpg', 'obstacle' => 0),
    );

    /** @var array */
    private static $mapType = array(
        'Town' => 1,
        'Zone' => 2, //carte de quete
        'WarZone' => 3, //carte de la zone de combat
        'Landscape' => 4, //carte du monde 
    );


    /**
     * @return array
     */
    public static function getGoal()
    {
        return self::$goal;
    }

    /**
     * @param array $goal
     */
    public static function setGoal($goal)
    {
        self::$goal = $goal;
    }

    /**
     * @return array
     */
    public static function getTypeItem()
    {
        return self::$typeItem;
    }

    /**
     * @param array $typeItem
     */
    public static function setTypeItem($typeItem)
    {
        self::$typeItem = $typeItem;
    }

    /**
     * @return array
     */
    public static function getRate()
    {
        return self::$rate;
    }

    /**
     * @param array $rate
     */
    public static function setRate($rate)
    {
        self::$rate = $rate;
    }

    /**
     * @return array
     */
    public static function getPopRate()
    {
        return self::$popRate;
    }

    /**
     * @param array $popRate
     */
    public static function setPopRate($popRate)
    {
        self::$popRate = $popRate;
    }

    /**
     * @return array
     */
    public static function getPriceBack()
    {
        return self::$priceBack;
    }

    /**
     * @param array $priceBack
     */
    public static function setPriceBack($priceBack)
    {
        self::$priceBack = $priceBack;
    }

    /**
     * @return array
     */
    public static function getTypePlace()
    {
        return self::$typePlace;
    }

    /**
     * @param array $typePlace
     */
    public static function setTypePlace($typePlace)
    {
        self::$typePlace = $typePlace;
    }

    /**
     * @return array
     */
    public static function getTypeInfo($key)
    {
        return self::$typeInfo[$key];
    }

    /**
     * @param array $typeInfo
     */
    public static function setTypeInfo($typeInfo)
    {
        self::$typeInfo = $typeInfo;
    }

    /**
     * @return array
     */
    public static function getTypeLabelInfo()
    {
        return self::$typeLabelInfo;
    }

    /**
     * @param array $typeLabelInfo
     */
    public static function setTypeLabelInfo($typeLabelInfo)
    {
        self::$typeLabelInfo = $typeLabelInfo;
    }

    /**
     * @return array
     */
    public static function getTypeMonster()
    {
        return self::$typeMonster;
    }

    /**
     * @param array $typeMonster
     */
    public static function setTypeMonster($typeMonster)
    {
        self::$typeMonster = $typeMonster;
    }

    /**
     * @return array
     */
    public static function getTypeLabelMonster()
    {
        return self::$typeLabelMonster;
    }

    /**
     * @param array $typeLabelMonster
     */
    public static function setTypeLabelMonster($typeLabelMonster)
    {
        self::$typeLabelMonster = $typeLabelMonster;
    }

    /**
     * @return array
     */
    public static function getLabelDifficulties()
    {
        return self::$LabelDifficulties;
    }

    /**
     * @param array $LabelDifficulties
     */
    public static function setLabelDifficulties($LabelDifficulties)
    {
        self::$LabelDifficulties = $LabelDifficulties;
    }

    /**
     * @return array
     */
    public static function getDifficulties()
    {
        return self::$difficulties;
    }

    /**
     * @param array $difficulties
     */
    public static function setDifficulties($difficulties)
    {
        self::$difficulties = $difficulties;
    }

    /**
     * @return array
     */
    public static function getLabelDecoration()
    {
        return self::$LabelDecoration;
    }

    /**
     * @param array $LabelDecoration
     */
    public static function setLabelDecoration($LabelDecoration)
    {
        self::$LabelDecoration = $LabelDecoration;
    }

    /**
     * @return array
     */
    public static function getLabelMapContent()
    {
        return self::$mapType;
    }

    /**
     * @param array $mapType
     */
    public static function setLabelMapContent($mapType)
    {
        self::$mapType = $mapType;
    }

}
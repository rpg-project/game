<?php
// src/AppBundle/Entity/CharacterLocation.php
namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;

class CharacterLocation extends EntityRepository
{
    public function findByCharacterid($characterId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT c.id FROM AppBundle:CharacterLocation c WHERE characterId = :characterId'
            )
            ->getResult();
    }
}
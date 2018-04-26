<?php
/**
 * Created by PhpStorm.
 * User: 924213
 * Date: 26/04/2018
 * Time: 09:02
 */

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query;

/**
 * Class InfosRepository
 * @package AppBundle\Entity
 */
class InfosRepository extends EntityRepository
{
    /**
     * @param int $hydrator
     * @return array
     */
    public function findAllHydrated($hydrator = Query::HYDRATE_ARRAY)
    {
        $query = $this->getEntityManager()
            ->createQuery(
                "SELECT i
                FROM AppBundle\Entity\Infos i
                "
            );

        return $query->getResult($hydrator);
    }
}
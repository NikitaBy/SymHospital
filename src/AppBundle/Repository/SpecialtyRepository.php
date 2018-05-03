<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Specialty;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class SpecialtyRepository extends EntityRepository
{
    /** @var EntityManager */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Specialty[]|array
     */
    public function getSpecialties()
    {
        return $this->entityManager->getRepository(Specialty::class)->findAll();
    }
}
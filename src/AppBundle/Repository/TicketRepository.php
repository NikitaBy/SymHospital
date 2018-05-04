<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    /** @var EntityManager */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager): void
    {
        $this->entityManager = $entityManager;
    }

    public function getFreeTimes(Doctor $doctor, $date)
    {

    }
}
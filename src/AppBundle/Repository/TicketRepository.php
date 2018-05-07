<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TicketRepository extends EntityRepository
{
    /** @var EntityManager */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param Doctor $doctor
     * @param $date
     * @param $time
     *
     * @return bool|null
     */
    public function checkTime(Doctor $doctor, $date, $time)
    {
        $freeTime = null;
        if(!$this->entityManager->getRepository(Ticket::class)->findBy(['doctor'=>$doctor, 'visitDate'=>$date, 'visitTime'=>$time])){
            $freeTime= true;
        }
        return $freeTime;
    }
}
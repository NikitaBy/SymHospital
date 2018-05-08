<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class TicketRepository
 *
 * @method Ticket[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TicketRepository extends EntityRepository
{
    /**
     * @var EntityManager
     */
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
     * @param \DateTime $date
     * @param \DateTime $time
     *
     * @return bool|null
     */
    public function checkTime(Doctor $doctor, \DateTime $date, \DateTime $time)
    {
        $freeTime = null;
        if(!$this->entityManager->getRepository(Ticket::class)->findBy(['doctor'=>$doctor, 'visitDate'=>$date, 'visitTime'=>$time])){
            $freeTime= true;
        }
        return $freeTime;
    }

    public function modifyTime(Ticket $ticket)
    {
        $visitDate = $ticket->getVisitDate();
        $visitTime = $ticket->getVisitTime();
        $visitTime->setDate($visitDate->format('Y'), $visitDate->format('m'), $visitDate->format('d'));
        $visitDate->setTime($visitTime->format('H'), $visitTime->format('i'), $visitTime->format('s'));

    }
}
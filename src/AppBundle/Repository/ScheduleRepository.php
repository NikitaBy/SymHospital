<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Schedule;
use AppBundle\Entity\Ticket;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ScheduleRepository extends EntityRepository
{
    /** @var EntityManager */
    protected $entityManager;

    /** @var TicketRepository */
    protected $ticketRepository;

    /**
     * @param Schedule $schedule
     *
     * @return array
     * @throws \Exception
     */
    public function getTimes(Schedule $schedule)
    {
        $startTime = $schedule->getTimeStart();
        $endTime = $schedule->getTimeEnd();
        $tickets=$this->entityManager->getRepository(Ticket::class)->findBy(['doctor'=>$schedule->getDoctor(), 'visitDate'=>$schedule->getDay()]);
        foreach ($tickets as $ticket){
            $tickets[$ticket->getVisitTime()->getTimestamp()]=$ticket;
        }
        $freeTimes=[];
        while ($startTime < $endTime){
            $startTime->add(new \DateInterval('PT15M'));
            if(!array_search($startTime, $tickets)){
                $freeTimes[]=$startTime;
            }
        }
        return $freeTimes;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param TicketRepository $ticketRepository
     */
    public function setTicketRepository(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }
}
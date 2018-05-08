<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
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
        $tickets=[];
        foreach ($this->entityManager->getRepository(Ticket::class)->findBy(['doctor'=>$schedule->getDoctor(), 'visitDate'=>$schedule->getDay()]) as $ticket){
            $tickets[$ticket->getVisitTime()->getTimestamp()]=$ticket;
        }
        $freeTimes=[];
        while ($startTime < $endTime){
            if(!array_key_exists($startTime->getTimestamp(), $tickets)){
                $freeTimes[] = clone $startTime;
            }
            $startTime->add(new \DateInterval('PT15M'));
        }
        return $freeTimes;
    }

    /**
     * @param Doctor $doctor
     * @param \DateTime $day
     *
     * @return Schedule|null|
     */
    public function getScheduleForDay(Doctor $doctor,\DateTime $day)
    {
        return $this->entityManager->getRepository(Schedule::class)->findOneBy(['doctor' => $doctor, 'day' => $day]);
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

    public function modifyTime(Schedule $schedule)
    {
        $day = $schedule->getDay();
        $timeStart = $schedule->getTimeStart();
        $timeEnd = $schedule->getTimeEnd();
        $timeStart->setDate($day->format('Y'), $day->format('m'), $day->format('d'));
        $timeEnd->setDate($day->format('Y'), $day->format('m'), $day->format('d'));
    }

}
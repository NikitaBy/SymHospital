<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Schedule;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class ScheduleRepository
 *
 * @method Schedule findOneBy(array $criteria, array $orderBy = null)
 */
class ScheduleRepository extends EntityRepository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var TicketRepository
     */
    protected $ticketRepository;

    /**
     * @param string $alias
     * @param null $indexBy
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createQueryBuilder($alias = 'Schedule', $indexBy = null)
    {
        return parent::createQueryBuilder($alias, $indexBy);
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

        foreach ($this->ticketRepository->findBy(['doctor'=>$schedule->getDoctor(), 'visitDate'=>$schedule->getTimeStart()->format('d-m-Y')]) as $ticket){
            $tickets[$ticket->getVisitDate()->getTimestamp()]=$ticket;
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
     * @param \DateTime $date
     *
     * @return mixed
     * @throws NonUniqueResultException
     */
    public function getDoctorScheduleByDate(Doctor $doctor, \DateTime $date)
    {
        $dateStart = clone $date;
        $dateEnd = clone $date;
        $dateStart->setTime(0, 0, 0);
        $dateEnd->setTime(23, 59, 59);
        $qb = $this->createQueryBuilder();

        $qb
            ->where('Schedule.doctor = :doctor')
            ->setParameter('doctor', $doctor)
            ->andWhere('Schedule.timeStart BETWEEN :dateStart AND :dateEnd')
            ->setParameter('dateStart', $dateStart)
            ->setParameter('dateEnd', $dateEnd);
        return $qb->getQuery()->getOneOrNullResult();
    }
    //TODO validation

}
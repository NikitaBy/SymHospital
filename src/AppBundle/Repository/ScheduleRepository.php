<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Schedule;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ScheduleRepository extends EntityRepository
{
    /** @var EntityManager */
    protected $entityManager;
    public function getTimes(Schedule $schedule)
    {
        $startTime = $schedule->getTimeStart();
        $endTime = $schedule->getTimeEnd();
        $intervals = array();
        while ($startTime < $endTime) {
            $intervals[]=date('H:m', $startTime);
//            $startTime->modify('+15 minutes')->format('H:i:s');
            $startTime = strtotime('+15 minutes', $startTime);
        }
        return $intervals;
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
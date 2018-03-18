<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity
 */
class Schedule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSch;

    /**
     * @var string
     *
     * @ORM\Column(name="Day", type="string", length=10, nullable=false)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="Worktime", type="string", length=10, nullable=true)
     */
    private $worktime;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor")
     */
    private $doctor;

    /**
     * @return int
     */
    public function getIdSch()
    {
        return $this->idSch;
    }

    /**
     * @param int $idSch
     */
    public function setIdSch($idSch)
    {
        $this->idSch = $idSch;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @param string $day
     */
    public function setDay($day)
    {
        $this->day = $day;
    }

    /**
     * @return string
     */
    public function getWorktime()
    {
        return $this->worktime;
    }

    /**
     * @param string $worktime
     */
    public function setWorktime($worktime)
    {
        $this->worktime = $worktime;
    }

    /**
     * @return mixed
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @param mixed $doctor
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
    }

}


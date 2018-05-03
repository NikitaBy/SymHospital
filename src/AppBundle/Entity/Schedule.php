<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

/**
 * Schedule
 *
 * @ORM\Table
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScheduleRepository")
 */
class Schedule
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var DateType
     * @ORM\Column(type="date", nullable=false)
     */
    private $day;

    /**
     * @var DateTimeType
     *
     * @ORM\Column(type="datetime",nullable=false)
     */
    private $timeStart;

    /**
     * @var DateTimeType
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $timeEnd;


    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="schedule", cascade={"persist", "remove"})
     */
    private $doctor;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set day
     *
     * @param \DateTime $day
     *
     * @return Schedule
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return \DateTime
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set timeStart
     *
     * @param \DateTime $timeStart
     *
     * @return Schedule
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return DateTimeType
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEnd
     *
     * @param \DateTime $timeEnd
     *
     * @return Schedule
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return DateTimeType
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set doctor
     *
     * @param Doctor $doctor
     *
     * @return Schedule
     */
    public function setDoctor(Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }
}

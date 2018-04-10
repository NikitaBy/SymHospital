<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient", inversedBy="ticket")
     */
    private $patient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visit_date", type="date")
     */
    private $visitDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="visit_time", type="time")
     */
    private $visitTime;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor", inversedBy="ticket")
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
     * Set visitDate
     *
     * @param \DateTime $visitDate
     *
     * @return Ticket
     */
    public function setVisitDate($visitDate)
    {
        $this->visitDate = $visitDate;

        return $this;
    }

    /**
     * Get visitDate
     *
     * @return \DateTime
     */
    public function getVisitDate()
    {
        return $this->visitDate;
    }

    /**
     * Set visitTime
     *
     * @param \DateTime $visitTime
     *
     * @return Ticket
     */
    public function setVisitTime($visitTime)
    {
        $this->visitTime = $visitTime;

        return $this;
    }

    /**
     * Get visitTime
     *
     * @return \DateTime
     */
    public function getVisitTime()
    {
        return $this->visitTime;
    }

    /**
     * Set patient
     *
     * @param \AppBundle\Entity\Patient $patient
     *
     * @return Ticket
     */
    public function setPatient(\AppBundle\Entity\Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return \AppBundle\Entity\Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set doctor
     *
     * @param \AppBundle\Entity\Doctor $doctor
     *
     * @return Ticket
     */
    public function setDoctor(\AppBundle\Entity\Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return \AppBundle\Entity\Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }
}

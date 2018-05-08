<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\DateTime;

/**
 * Ticket
 *
 * @ORM\Table
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TicketRepository")
 */
class Ticket
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Patient::class, inversedBy="ticket", cascade={"persist", "remove"},)
     */
    private $patient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $visitDate;


    /**
     * @ORM\ManyToOne(targetEntity=Doctor::class, inversedBy="ticket", cascade={"persist", "remove"},)
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
     * Set patient
     *
     * @param Patient $patient
     *
     * @return Ticket
     */
    public function setPatient(Patient $patient = null)
    {
        $this->patient = $patient;
//        $patient->addTicket($this);
        return $this;
    }

    /**
     * Get patient
     *
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set doctor
     *
     * @param Doctor $doctor
     *
     * @return Ticket
     */
    public function setDoctor(Doctor $doctor = null)
    {
        $this->doctor = $doctor;
        $doctor->addTicket($this);
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

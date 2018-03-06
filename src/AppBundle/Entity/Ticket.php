<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity
 */
class Ticket
{
    /**
     *
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\Patient")
     *
     */
    private $patient;

    /**
     * @var Date
     *
     * @ORM\Column(name="VisitDate", type="date", nullable=false)
     */
    private $visitDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="VisitTime", type="datetime", nullable=false)
     */
    private $visitTime;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Doctor")
     */
    private $doctor;
}
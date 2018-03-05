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
     * @var integer
     *
     * @ORM\Column(name="Patient", type="integer", nullable=false)
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
     * @var integer
     *
     * @ORM\Column(name="Doctor", type="integer", nullable=false)
     */
    private $doctor;
}
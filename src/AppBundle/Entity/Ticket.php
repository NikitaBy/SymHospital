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
     * @ORM\Column(name="ID_T", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idT;


    /**
     *
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient", inversedBy="patTic")
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Doctor", inversedBy="ticDoc")
     */
    private $doctor;
}
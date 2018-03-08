<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity
 */
class Doctor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idD;

    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=10, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="MidlName", type="string", length=15, nullable=true)
     */
    private $midlname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=15, nullable=false)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="doctor")
     */
    private $ticket;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History")
     */
    private $history;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Specialty")
     */
    private $specialty;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Schedule")
     */
    private $schedule;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Room")
     */
    private $room;
}


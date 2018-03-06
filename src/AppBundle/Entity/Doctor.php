<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity(repositoryClass="DoctorRepository")
 */
class Doctor
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_D", type="integer", nullable=false)
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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Schedule", inversedBy="docToSch")
     * @ORM\JoinTable(DocToSch)
     */
    private $schedule;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Specialty", inversedBy="docToSpec")
     * @ORM\JoinTable(DocToSpec)
     */
    private $speciality;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Room", inversedBy="roomToDoc")
     * @ORM\JoinTable(RoomToDoc)
     */
    private $room;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History", inversedBy="hisToDoc")
     * @ORM\JoinTable(HisToDoc)
     */
    private $history;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", inversedBy="ticket", cascade={"persist", "remove"})
     */
    private $ticket;

}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_P", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idP;

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
     * @var \DateTime
     *
     * @ORM\Column(name="Age", type="datetime", nullable=false)
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="patTic")
     */
    private $ticket;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History", inversedBy="patToHis")
     * @ORM\JoinTable(name="PatToHis")
     */
    private $history;


}


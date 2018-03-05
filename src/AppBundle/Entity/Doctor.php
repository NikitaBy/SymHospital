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


}


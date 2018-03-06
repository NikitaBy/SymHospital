<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity
 */
class Room
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_R", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idR;

    /**
     * @var integer
     *
     * @ORM\Column(name="Number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor", inversedBy="roomToDoc")
     * @ORM\JoinTable(RoomToDoc)
     */
    private $doctor;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Equipment", inversedBy="roomToEq")
     * @ORM\JoinTable(RoomToEq)
     */
    private $equipment;




}


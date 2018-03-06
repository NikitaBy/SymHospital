<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity
 */
class Equipment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_E", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idE;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Application", type="string", length=20, nullable=false)
     */
    private $application;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Room", inversedBy="roomToEq")
     * @ORM\JoinTable(RoomToEq)
     */
    private $room;


}


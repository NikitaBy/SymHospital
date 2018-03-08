<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table(name="schedule")
 * @ORM\Entity
 */
class Schedule
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSch;

    /**
     * @var string
     *
     * @ORM\Column(name="Day", type="string", length=10, nullable=false)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="Worktime", type="string", length=10, nullable=true)
     */
    private $worktime;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor")
     */
    private $doctor;

}


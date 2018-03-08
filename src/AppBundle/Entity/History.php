<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity(repositoryClass="HistoryRepository")
 */
class History
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idH;

    /**
     * @return int
     */
    public function getIdH()
    {
        return $this->idH;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="VisitDate", type="datetime", nullable=false)
     */
    private $visitdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CurePeriod", type="datetime", nullable=true)
     */
    private $cureperiod;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor")
     */
    private $doctor;


    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Patient")
     */
    private $patient;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Symptoms")
     */
    private $symptoms;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Disease")
     */
    private $disease;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Medicine")
     */
    private $medicine;
}


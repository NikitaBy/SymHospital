<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity
 */
class History
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_H", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idH;

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
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Disease", inversedBy="hisToDis")
     * @ORM\JoinTable(HisToDis)
     */
    private $disease;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Medicine", inversedBy="hisToMed")
     * @ORM\JoinTable(HisToMed)
     */
    private $medicine;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Symptoms", inversedBy="symToHis")
     * @ORM\JoinTable(SymToHis)
     */
    private $symptoms;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Patient", inversedBy="patToHis")
     * @ORM\JoinTable(PatToHis)
     */
    private $patient;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor", inversedBy="hisToDoc")
     * @ORM\JoinTable(HisToDoc)
     */
    private $doctor;






}


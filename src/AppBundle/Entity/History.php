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
     * @return \DateTime
     */
    public function getVisitdate()
    {
        return $this->visitdate;
    }

    /**
     * @param \DateTime $visitdate
     */
    public function setVisitdate($visitdate)
    {
        $this->visitdate = $visitdate;
    }

    /**
     * @return \DateTime
     */
    public function getCureperiod()
    {
        return $this->cureperiod;
    }

    /**
     * @param \DateTime $cureperiod
     */
    public function setCureperiod($cureperiod)
    {
        $this->cureperiod = $cureperiod;
    }

    /**
     * @return mixed
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * @param mixed $doctor
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * @return mixed
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * @param mixed $patient
     */
    public function setPatient($patient)
    {
        $this->patient = $patient;
    }

    /**
     * @return mixed
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * @param mixed $symptoms
     */
    public function setSymptoms($symptoms)
    {
        $this->symptoms = $symptoms;
    }

    /**
     * @return mixed
     */
    public function getDisease()
    {
        return $this->disease;
    }

    /**
     * @param mixed $disease
     */
    public function setDisease($disease)
    {
        $this->disease = $disease;
    }

    /**
     * @return mixed
     */
    public function getMedicine()
    {
        return $this->medicine;
    }

    /**
     * @param mixed $medicine
     */
    public function setMedicine($medicine)
    {
        $this->medicine = $medicine;
    }

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


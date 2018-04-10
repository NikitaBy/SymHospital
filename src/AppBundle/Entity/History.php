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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->doctor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patient = new \Doctrine\Common\Collections\ArrayCollection();
        $this->symptoms = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disease = new \Doctrine\Common\Collections\ArrayCollection();
        $this->medicine = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idH
     *
     * @return integer
     */
    public function getIdH()
    {
        return $this->idH;
    }

    /**
     * Set visitdate
     *
     * @param \DateTime $visitdate
     *
     * @return History
     */
    public function setVisitdate($visitdate)
    {
        $this->visitdate = $visitdate;

        return $this;
    }

    /**
     * Get visitdate
     *
     * @return \DateTime
     */
    public function getVisitdate()
    {
        return $this->visitdate;
    }

    /**
     * Set cureperiod
     *
     * @param \DateTime $cureperiod
     *
     * @return History
     */
    public function setCureperiod($cureperiod)
    {
        $this->cureperiod = $cureperiod;

        return $this;
    }

    /**
     * Get cureperiod
     *
     * @return \DateTime
     */
    public function getCureperiod()
    {
        return $this->cureperiod;
    }

    /**
     * Add doctor
     *
     * @param \AppBundle\Entity\Doctor $doctor
     *
     * @return History
     */
    public function addDoctor(\AppBundle\Entity\Doctor $doctor)
    {
        $this->doctor[] = $doctor;

        return $this;
    }

    /**
     * Remove doctor
     *
     * @param \AppBundle\Entity\Doctor $doctor
     */
    public function removeDoctor(\AppBundle\Entity\Doctor $doctor)
    {
        $this->doctor->removeElement($doctor);
    }

    /**
     * Get doctor
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Add patient
     *
     * @param \AppBundle\Entity\Patient $patient
     *
     * @return History
     */
    public function addPatient(\AppBundle\Entity\Patient $patient)
    {
        $this->patient[] = $patient;

        return $this;
    }

    /**
     * Remove patient
     *
     * @param \AppBundle\Entity\Patient $patient
     */
    public function removePatient(\AppBundle\Entity\Patient $patient)
    {
        $this->patient->removeElement($patient);
    }

    /**
     * Get patient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Add symptom
     *
     * @param \AppBundle\Entity\Symptoms $symptom
     *
     * @return History
     */
    public function addSymptom(\AppBundle\Entity\Symptoms $symptom)
    {
        $this->symptoms[] = $symptom;

        return $this;
    }

    /**
     * Remove symptom
     *
     * @param \AppBundle\Entity\Symptoms $symptom
     */
    public function removeSymptom(\AppBundle\Entity\Symptoms $symptom)
    {
        $this->symptoms->removeElement($symptom);
    }

    /**
     * Get symptoms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * Add disease
     *
     * @param \AppBundle\Entity\Disease $disease
     *
     * @return History
     */
    public function addDisease(\AppBundle\Entity\Disease $disease)
    {
        $this->disease[] = $disease;

        return $this;
    }

    /**
     * Remove disease
     *
     * @param \AppBundle\Entity\Disease $disease
     */
    public function removeDisease(\AppBundle\Entity\Disease $disease)
    {
        $this->disease->removeElement($disease);
    }

    /**
     * Get disease
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDisease()
    {
        return $this->disease;
    }

    /**
     * Add medicine
     *
     * @param \AppBundle\Entity\Medicine $medicine
     *
     * @return History
     */
    public function addMedicine(\AppBundle\Entity\Medicine $medicine)
    {
        $this->medicine[] = $medicine;

        return $this;
    }

    /**
     * Remove medicine
     *
     * @param \AppBundle\Entity\Medicine $medicine
     */
    public function removeMedicine(\AppBundle\Entity\Medicine $medicine)
    {
        $this->medicine->removeElement($medicine);
    }

    /**
     * Get medicine
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMedicine()
    {
        return $this->medicine;
    }
}

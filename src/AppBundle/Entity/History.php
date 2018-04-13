<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idH;


    /**
     * @var \DateTime
     *
     * @ORM\Column( type="datetime", nullable=false)
     */
    private $visitdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $cureperiod;


    /**
     * @ORM\ManyToMany(targetEntity=Doctor::class)
     */
    private $doctor;


    /**
     * @ORM\ManyToOne(targetEntity=Patient, inversedBy="history")
     */
    private $patient;

    /**
     * @ORM\ManyToMany(targetEntity=Symptoms::class)
     */
    private $symptoms;

    /**
     * @ORM\ManyToMany(targetEntity=Disease::class)
     */
    private $disease;

    /**
     * @ORM\ManyToMany(targetEntity=Medicine::class)
     */
    private $medicine;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->doctor = new ArrayCollection();
        $this->patient = new ArrayCollection();
        $this->symptoms = new ArrayCollection();
        $this->disease = new ArrayCollection();
        $this->medicine = new ArrayCollection();
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
     * @param Doctor $doctor
     *
     * @return History
     */
    public function addDoctor(Doctor $doctor)
    {
        $this->doctor[] = $doctor;
        $doctor->addHistory($this);
        return $this;
    }

    /**
     * Remove doctor
     *
     * @param Doctor $doctor
     */
    public function removeDoctor(Doctor $doctor)
    {
        $this->doctor->removeElement($doctor);
    }

    /**
     * Get doctor
     *
     * @return Collection
     */
    public function getDoctor()
    {
        return $this->doctor;
    }

    /**
     * Add patient
     *
     * @param Patient $patient
     *
     * @return History
     */


    /**
     * Add symptom
     *
     * @param Symptoms $symptom
     *
     * @return History
     */
    public function addSymptom(Symptoms $symptom)
    {
        $this->symptoms[] = $symptom;
        $symptom->addHistory($this);
        return $this;
    }

    /**
     * Remove symptom
     *
     * @param Symptoms $symptom
     */
    public function removeSymptom(Symptoms $symptom)
    {
        $this->symptoms->removeElement($symptom);
    }

    /**
     * Get symptoms
     *
     * @return Collection
     */
    public function getSymptoms()
    {
        return $this->symptoms;
    }

    /**
     * Add disease
     *
     * @param Disease $disease
     *
     * @return History
     */
    public function addDisease(Disease $disease)
    {
        $this->disease[] = $disease;
        $disease->addHistory($this);
        return $this;
    }

    /**
     * Remove disease
     *
     * @param Disease $disease
     */
    public function removeDisease(Disease $disease)
    {
        $this->disease->removeElement($disease);
    }

    /**
     * Get disease
     *
     * @return Collection
     */
    public function getDisease()
    {
        return $this->disease;
    }

    /**
     * Add medicine
     *
     * @param Medicine $medicine
     *
     * @return History
     */
    public function addMedicine(Medicine $medicine)
    {
        $this->medicine[] = $medicine;

        return $this;
    }

    /**
     * Remove medicine
     *
     * @param Medicine $medicine
     */
    public function removeMedicine(Medicine $medicine)
    {
        $this->medicine->removeElement($medicine);
    }

    /**
     * Get medicine
     *
     * @return Collection
     */
    public function getMedicine()
    {
        return $this->medicine;
    }

    /**
     * Set patient
     *
     * @param Patient $patient
     *
     * @return History
     */
    public function setPatient(Patient $patient = null)
    {
        $this->patient = $patient;
        $patient->addHistory($this);
        return $this;
    }

    /**
     * Get patient
     *
     * @return Collection
     */
    public function getPatient()
    {
        return $this->patient;
    }
}

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
     * @ORM\Column( type="datetime", nullable=false)
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient", inversedBy="history")
     */
    private $patient;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Symptoms")
     */
    private $symptoms;

    /**
     *
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
     * @return string
     */
    public function getVisitdate()
    {
        return  $this->visitdate->format('Y-M-d');
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
     * @return string
     */
    public function getCureperiod()
    {
        return $this->cureperiod->format('Y-M-d');
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatient()
    {
        return $this->patient;
    }
}

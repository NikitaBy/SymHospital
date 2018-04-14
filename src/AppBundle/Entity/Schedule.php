<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Schedule
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Schedule
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $worktime;

    /**
     * @ORM\ManyToMany(targetEntity=Doctor::class)
     */
    private $doctor;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->doctor = new ArrayCollection();
    }

    /**
     * Get idSch
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set day
     *
     * @param string $day
     *
     * @return Schedule
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set worktime
     *
     * @param string $worktime
     *
     * @return Schedule
     */
    public function setWorktime($worktime)
    {
        $this->worktime = $worktime;

        return $this;
    }

    /**
     * Get worktime
     *
     * @return string
     */
    public function getWorktime()
    {
        return $this->worktime;
    }

    /**
     * Add doctor
     *
     * @param Doctor $doctor
     *
     * @return Schedule
     */
    public function addDoctor(Doctor $doctor)
    {
        $this->doctor[] = $doctor;

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
}

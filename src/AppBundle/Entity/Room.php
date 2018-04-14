<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Room
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Room
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
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=Doctor::class)
     */
    private $doctor;

    /**
     * @ORM\ManyToMany(targetEntity=Equipment::class)
     */
    private $equipment;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->doctor = new ArrayCollection();
        $this->equipment = new ArrayCollection();
    }

    /**
     * Get idR
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return Room
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Room
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Add doctor
     *
     * @param Doctor $doctor
     *
     * @return Room
     */
    public function addDoctor(Doctor $doctor)
    {
        $this->doctor[] = $doctor;
        $doctor->setRoom($this);
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
     * @param mixed $doctor
     */
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
    }

    /**
     * Add equipment
     *
     * @param Equipment $equipment
     *
     * @return Room
     */
    public function addEquipment(Equipment $equipment)
    {
        $this->equipment[] = $equipment;
        $equipment->addRoom($this);
        return $this;
    }

    /**
     * Remove equipment
     *
     * @param Equipment $equipment
     */
    public function removeEquipment(Equipment $equipment)
    {
        $this->equipment->removeElement($equipment);
    }

    /**
     * Get equipment
     *
     * @return Collection
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    public function __toString()
    {
        return (string) $this->getNumber();
    }
}

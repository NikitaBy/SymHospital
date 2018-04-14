<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Specialty
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Specialty
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
     * @ORM\Column(type="string", length=15, nullable=false)
     */
    private $spec;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $domain;

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
     * Get idS
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set spec
     *
     * @param string $spec
     *
     * @return Specialty
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Get spec
     *
     * @return string
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return Specialty
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Add doctor
     *
     * @param Doctor $doctor
     *
     * @return Specialty
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

    public function __toString()
    {
        //return (string) $this->getIdS();
        return $this->getSpec().' '.$this->getDomain();
    }

}

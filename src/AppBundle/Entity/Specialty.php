<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Specialty
 *
 * @ORM\Table(name="specialty")
 * @ORM\Entity
 */
class Specialty
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idS;

    /**
     * @var string
     *
     * @ORM\Column(name="Spec", type="string", length=15, nullable=false)
     */
    private $spec;

    /**
     * @var string
     *
     * @ORM\Column(name="Domain", type="string", length=15, nullable=true)
     */
    private $domain;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Doctor")
     */
    private $doctor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->doctor = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idS
     *
     * @return integer
     */
    public function getIdS()
    {
        return $this->idS;
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
     * @param \AppBundle\Entity\Doctor $doctor
     *
     * @return Specialty
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
}

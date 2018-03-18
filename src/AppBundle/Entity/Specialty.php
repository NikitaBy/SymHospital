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
     * @return int
     */
    public function getIdS()
    {
        return $this->idS;
    }

    /**
     * @param int $idS
     */
    public function setIdS($idS)
    {
        $this->idS = $idS;
    }

    /**
     * @return string
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * @param string $spec
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;
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

}


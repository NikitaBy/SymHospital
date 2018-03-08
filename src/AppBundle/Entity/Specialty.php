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
     * @ORM\Column(name="ID_S", type="integer", nullable=false)
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


}


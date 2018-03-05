<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symptoms
 *
 * @ORM\Table(name="symptoms")
 * @ORM\Entity
 */
class Symptoms
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
     * @ORM\Column(name="Description", type="string", length=30, nullable=false)
     */
    private $description;


}


<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicine
 *
 * @ORM\Table(name="medicine")
 * @ORM\Entity
 */
class Medicine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_M", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idM;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=15, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=15, nullable=false)
     */
    private $type;


}


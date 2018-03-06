<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disease
 *
 * @ORM\Table(name="disease")
 * @ORM\Entity
 */
class Disease
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_Dis", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idDis;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Domain", type="string", length=10, nullable=false)
     */
    private $domain;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History", inversedBy="hisToDis")
     * @ORM\JoinTable(HisToDis)
     */
    private $history;


}


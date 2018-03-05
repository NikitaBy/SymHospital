<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SymToHist
 *
 * @ORM\Table(name="symtohist")
 * @ORM\Entity
 */
class SymToHist
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_h", type="integer", nullable=false)
     */
    private $id_h;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_m", type="integer", nullable=false)
     */
    private $id_s;
}
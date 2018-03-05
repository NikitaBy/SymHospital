<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocToSch
 *
 * @ORM\Table(name="doctosch")
 * @ORM\Entity
 */
class DocToSch
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_d", type="integer", nullable=false)
     */
    private $id_d;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_sch", type="integer", nullable=false)
     */
    private $id_sch;
}
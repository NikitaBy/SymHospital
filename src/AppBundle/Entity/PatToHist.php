<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class PatToHist
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
     * @ORM\Column(name="ID_p", type="integer", nullable=false)
     */
    private $id_p;
}
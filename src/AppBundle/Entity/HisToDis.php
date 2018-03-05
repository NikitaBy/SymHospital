<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class HisToDis
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
    private $id_dis;
}
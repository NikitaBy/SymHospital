<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HisToDis
 *
 * @ORM\Table(name="histodis")
 * @ORM\Entity
 */
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
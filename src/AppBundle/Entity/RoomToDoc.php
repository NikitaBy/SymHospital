<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RoomToDoc
 *
 * @ORM\Table(name="roomtodoc")
 * @ORM\Entity
 */
class RoomToDoc
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_h", type="integer", nullable=false)
     */
    private $id_r;

    /**
     * @var integer
     *
     * @ORM\Column(name="ID_m", type="integer", nullable=false)
     */
    private $id_d;
}
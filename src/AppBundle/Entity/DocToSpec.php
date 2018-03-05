<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class DocToSpec
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
     * @ORM\Column(name="ID_s", type="integer", nullable=false)
     */
    private $id_s;
}
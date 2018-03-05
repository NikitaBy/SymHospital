<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HisToMed
 *
 * @ORM\Table(name="histomed")
 * @ORM\Entity
 */
class HisToMed
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
    private $id_m;
}
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 05.03.2018
 * Time: 22:00
 */
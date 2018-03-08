<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * History
 *
 * @ORM\Table(name="history")
 * @ORM\Entity
 */
class History
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID_H", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idH;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="VisitDate", type="datetime", nullable=false)
     */
    private $visitdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CurePeriod", type="datetime", nullable=true)
     */
    private $cureperiod;


}


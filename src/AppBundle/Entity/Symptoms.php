<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Symptoms
 *
 * @ORM\Table(name="symptoms")
 * @ORM\Entity
 */
class Symptoms
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idS;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", length=30, nullable=false)
     */
    private $description;

    /**
     * @return int
     */
    public function getIdS()
    {
        return $this->idS;
    }

    /**
     * @param int $idS
     */
    public function setIdS($idS)
    {
        $this->idS = $idS;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * @param mixed $history
     */
    public function setHistory($history)
    {
        $this->history = $history;
    }

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History")
     */
    private $history;

}


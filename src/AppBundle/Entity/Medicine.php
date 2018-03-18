<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicine
 *
 * @ORM\Table(name="medicine")
 * @ORM\Entity
 */
class Medicine
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idM;

    /**
     * @return int
     */
    public function getIdM()
    {
        return $this->idM;
    }

    /**
     * @param int $idM
     */
    public function setIdM($idM)
    {
        $this->idM = $idM;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=15, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Type", type="string", length=15, nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History")
     */
    private $history;


}


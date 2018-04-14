<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Symptoms
 *
 * @ORM\Table
 * @ORM\Entity
 */
class Symptoms
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=History::class)
     */
    private $history;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->history = new ArrayCollection();
    }

    /**
     * Get idS
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Symptoms
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add history
     *
     * @param History $history
     *
     * @return Symptoms
     */
    public function addHistory(History $history)
    {
        $this->history[] = $history;

        return $this;
    }

    /**
     * Remove history
     *
     * @param History $history
     */
    public function removeHistory(History $history)
    {
        $this->history->removeElement($history);
    }

    /**
     * Get history
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getHistory()
    {
        return $this->history;
    }

    public function __toString()
    {
        return (string) $this->getDescription();
    }
}

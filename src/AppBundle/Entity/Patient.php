<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users\User;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity
 */
class Patient
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
     * @var \DateTime
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $age;

    /**
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="patient")
     */
    private $ticket;


    /**
     * @ORM\OneToMany(targetEntity=History::class, mappedBy="patient")
     */
    private $history;

    /**
     * @ORM\OneToOne(targetEntity=User::class)
     */
    private $userId;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ticket = new ArrayCollection();
        $this->history = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    
    /**
     * Set age
     *
     * @param \DateTime $age
     *
     * @return Patient
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return \DateTime
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Add ticket
     *
     * @param Ticket $ticket
     *
     * @return Patient
     */
    public function addTicket(Ticket $ticket)
    {
        $this->ticket[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param Ticket $ticket
     */
    public function removeTicket(Ticket $ticket)
    {
        $this->ticket->removeElement($ticket);
    }

    /**
     * Get ticket
     *
     * @return Collection
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    public function __toString()
    {
        return (string) $this->userId;
    }

    /**
     * Add history
     *
     * @param History $history
     *
     * @return Patient
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
     * @return Collection
     */
    public function getHistory()
    {
        return $this->history;
    }

    public function getYrs()
    {
        return date('Y')-date('Y',strtotime($this->age));
    }
}

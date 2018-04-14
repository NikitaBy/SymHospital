<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users\User;

/**
 * Patient
 *
 * @ORM\Table
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
    private $birthDate;

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
    private $user;


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
     * Set birthDate
     *
     * @param \DateTime $birthDate
     *
     * @return Patient
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * Get birthDate
     *
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
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
        return (string) $this->user;
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
        return date('Y')-date('Y',strtotime($this->birthDate));
    }

    /**
     * Set userId
     *
     * @param User $user
     *
     * @return Patient
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}

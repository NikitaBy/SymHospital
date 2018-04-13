<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users\User;


/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity
 */
class Doctor
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
     * @ORM\OneToMany(targetEntity=Ticket::class, mappedBy="doctor")
     */
    private $ticket;

    /**
     * @ORM\ManyToMany(targetEntity=History::class)
     */
    private $history;

    /**
     * @ORM\ManyToMany(targetEntity=Specialty::class)
     */
    private $specialty;

    /**
     * @ORM\ManyToMany(targetEntity=Schedule::class)
     */
    private $schedule;

    /**
     * @ORM\ManyToMany(targetEntity=Room::class)
     */
    private $room;

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
        $this->specialty = new ArrayCollection();
        $this->schedule = new ArrayCollection();
        $this->room = new ArrayCollection();
    }

    /**
     * Get idD
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Add ticket
     *
     * @param Ticket $ticket
     *
     * @return Doctor
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

    /**
     * Add history
     *
     * @param History $history
     *
     * @return Doctor
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

    /**
     * Add specialty
     *
     * @param Specialty $specialty
     *
     * @return Doctor
     */
    public function addSpecialty(Specialty $specialty)
    {
        $this->specialty[] = $specialty;

        return $this;
    }

    /**
     * Remove specialty
     *
     * @param Specialty $specialty
     */
    public function removeSpecialty(Specialty $specialty)
    {
        $this->specialty->removeElement($specialty);
    }

    /**
     * Get specialty
     *
     * @return Collection
     */
    public function getSpecialty()
    {
        return $this->specialty;
    }

    /**
     * Add schedule
     *
     * @param Schedule $schedule
     *
     * @return Doctor
     */
    public function addSchedule(Schedule $schedule)
    {
        $this->schedule[] = $schedule;

        return $this;
    }

    /**
     * Remove schedule
     *
     * @param Schedule $schedule
     */
    public function removeSchedule(Schedule $schedule)
    {
        $this->schedule->removeElement($schedule);
    }

    /**
     * Get schedule
     *
     * @return Collection
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Add room
     *
     * @param Room $room
     *
     * @return Doctor
     */
    public function addRoom(Room $room)
    {
        $this->room[] = $room;
        $room->setDoctor($this);
        return $this;
    }

    /**
     * Remove room
     *
     * @param Room $room
     */
    public function removeRoom(Room $room)
    {
        $this->room->removeElement($room);
    }

    /**
     * @param mixed $room
     */
    public function setRoom($room)
    {
        $this->room = $room;
    }

    /**
     * Get room
     *
     * @return Collection
     */
    public function getRoom()
    {
        return $this->room;
    }



    /**
     * Set userId
     *
     * @param User $user
     *
     * @return Doctor
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get userId
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}

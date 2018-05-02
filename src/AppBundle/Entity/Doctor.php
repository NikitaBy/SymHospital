<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Users\User;


/**
 * Doctor
 *
 * @ORM\Table
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorRepository")
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
     * @ORM\OneToMany(targetEntity=Ticket::class,cascade={"persist", "remove"}, mappedBy="doctor", cascade={"persist", "remove"})
     */
    private $ticket;

    /**
     * @ORM\ManyToMany(targetEntity=History::class,cascade={"persist", "remove"})
     */
    private $history;

    /**
     * @ORM\ManyToMany(targetEntity=Specialty::class,cascade={"persist", "remove"})
     */
    private $specialty;

    /**
     * @ORM\OneToMany(targetEntity=Schedule::class, mappedBy="doctor", cascade={"persist", "remove"})
     */
    private $schedule;

    /**
     * @ORM\ManyToMany(targetEntity=Room::class,cascade={"persist", "remove"})
     */
    private $room;

    /**
     * @ORM\OneToOne(targetEntity=User::class,cascade={"persist", "remove"})
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
        $specialty->addDoctor($this);
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
        $user->setDoctor($this);
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

    public function __toString()
    {
        return (string) $this->user;
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
        $schedule->setDoctor($this);
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}

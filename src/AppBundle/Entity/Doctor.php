<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


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
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idD;


    /**
     * @var string
     *
     * @ORM\Column(name="FirstName", type="string", length=10, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="MidlName", type="string", length=15, nullable=true)
     */
    private $midlname;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=15, nullable=false)
     */
    private $lastname;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ticket", mappedBy="doctor")
     */
    private $ticket;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\History")
     */
    private $history;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Specialty")
     */
    private $specialty;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Schedule")
     */
    private $schedule;

    /**
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Room")
     */
    private $room;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ticket = new \Doctrine\Common\Collections\ArrayCollection();
        $this->history = new \Doctrine\Common\Collections\ArrayCollection();
        $this->specialty = new \Doctrine\Common\Collections\ArrayCollection();
        $this->schedule = new \Doctrine\Common\Collections\ArrayCollection();
        $this->room = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idD
     *
     * @return integer
     */
    public function getIdD()
    {
        return $this->idD;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Doctor
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set midlname
     *
     * @param string $midlname
     *
     * @return Doctor
     */
    public function setMidlname($midlname)
    {
        $this->midlname = $midlname;

        return $this;
    }

    /**
     * Get midlname
     *
     * @return string
     */
    public function getMidlname()
    {
        return $this->midlname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Doctor
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
     * @return \Doctrine\Common\Collections\Collection
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
        $room->setDocttor($this);
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoom()
    {
        return $this->room;
    }

    public function __toString()
    {
        return (string) $this->getLastname();
    }
}

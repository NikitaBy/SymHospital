<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity
 */
class Equipment
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idE;



    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20, nullable=false)
     */
    private $application;

    /**
     * @ORM\ManyToMany(targetEntity=Room::class)
     */
    private $room;



    /**
     * Constructor
     */
    public function __construct()
    {
        $this->room = new ArrayCollection();
    }

    /**
     * Get idE
     *
     * @return integer
     */
    public function getIdE()
    {
        return $this->idE;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Equipment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set application
     *
     * @param string $application
     *
     * @return Equipment
     */
    public function setApplication($application)
    {
        $this->application = $application;

        return $this;
    }

    /**
     * Get application
     *
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Add room
     *
     * @param Room $room
     *
     * @return Equipment
     */
    public function addRoom(Room $room)
    {
        $this->room[] = $room;

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
     * Get room
     *
     * @return Collection
     */
    public function getRoom()
    {
        return $this->room;
    }

    public function __toString()
    {
        return (string) $this->getName();
    }
}

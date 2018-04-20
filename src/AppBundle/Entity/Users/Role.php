<?php

namespace AppBundle\Entity\Users;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class Role
{
    const ROLE_DEFAULT = 'ROLE_PATIENT';
    const ROLE_DOCTOR = 'ROLE_DOCTOR';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=UserRole::class, mappedBy="roles", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @var string
     *
     *@ORM\Column(type="string", length=255, nullable=false)
     */
    private $userRole;

    /**
     * @return string
     */
    public function getUserRole()
    {
        return $this->userRole;
    }

    /**
     * @param string $userRole
     */
    public function setUserRole(string $userRole)
    {
        $this->userRole = $userRole;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new ArrayCollection();
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
     * Add user
     *
     * @param UserRole $user
     *
     * @return Role
     */
    public function addUser(UserRole $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param UserRole $user
     */
    public function removeUser(UserRole $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    public function __toString()
    {
        return (string) $this->getUserRole();
    }
}

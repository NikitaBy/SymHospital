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
    const ROLE_PATIENT = 'ROLE_PATIENT';
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
    private $userRole;

    /**
     * @var string
     *
     *@ORM\Column(type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->userRole = new ArrayCollection();
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
     * Set role
     *
     * @param string $code
     *
     * @return Role
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add userRole
     *
     * @param UserRole $userRole
     *
     * @return Role
     */
    public function addUserRole(UserRole $userRole)
    {
        $this->userRole[] = $userRole;

        return $this;
    }

    /**
     * Remove userRole
     *
     * @param UserRole $userRole
     */
    public function removeUserRole(UserRole $userRole)
    {
        $this->userRole->removeElement($userRole);
    }

    /**
     * Get userRole
     *
     * @return Collection
     */
    public function getUserRole()
    {
        return $this->userRole;
    }
}

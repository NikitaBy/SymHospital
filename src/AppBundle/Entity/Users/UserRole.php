<?php


namespace AppBundle\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class UserRole
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="role", cascade={"persist", "remove"})
     *
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Role::class, inversedBy="user", cascade={"persist", "remove"})
     */
    private $role;

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
     * Set user
     *
     * @param User $user
     *
     * @return UserRole
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

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getRole();
    }

    /**
     * Set roles
     *
     * @param Role $role
     *
     * @return UserRole
     */
    public function setRole(Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get roles
     *
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

}

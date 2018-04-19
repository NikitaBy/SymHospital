<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/12/18
 * Time: 3:20 PM
 */

namespace AppBundle\Entity\Users;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table
 */
class UserRole
{
    /**
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="role", cascade={"persist", "remove"})
     *
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="Role", inversedBy="user", cascade={"persist", "remove"})
     */
    private $roles;



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
     * Set role
     *
     * @param Role $role
     *
     * @return UserRole
     */
    public function setRoles(Role $role = null)
    {
        $this->roles = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return Role
     */
    public function getRoles()
    {
        return $this->roles;
    }
}

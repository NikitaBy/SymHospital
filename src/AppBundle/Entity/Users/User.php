<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/11/18
 * Time: 11:41 AM
 */

namespace AppBundle\Entity\Users;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    const ROLE_DEFAULT = 'ROLE_PATIENT';
    const ROLE_DOCTOR = 'ROLE_DOCTOR';
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';



    public function __construct()
    {
       //parent::__construct();
       // $this->roles->
    }

    /**
     * @ORM\OneToMany(targetEntity="UserRole", mappedBy="user")
     */
    protected $roles;




    /**
     * Get role
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
    * @param mixed $role
    */
    public function setRoles($role): void
    {
        $this->roles = $role;
    }

}

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



//    public function __construct()
//    {
//       //parent::__construct();
//       // $this->roles->
//    }

    /**
     * @ORM\OneToMany(targetEntity="UserRole", mappedBy="user")
     */
    protected $usr_roles;



    /**
     * Add usrRole
     *
     * @param UserRole $usrRole
     *
     * @return User
     */
    public function addUsrRole(UserRole $usrRole)
    {
        $this->usr_roles[] = $usrRole;

        return $this;
    }

    /**
     * Remove usrRole
     *
     * @param UserRole $usrRole
     */
    public function removeUsrRole(UserRole $usrRole)
    {
        $this->usr_roles->removeElement($usrRole);
    }

    /**
     * Get usrRoles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsrRoles()
    {
        return $this->usr_roles;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/11/18
 * Time: 11:41 AM
 */

namespace AppBundle\Entity\Users;

use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="UserRole", mappedBy="user", cascade={"persist", "remove"})
     */
    protected $usrRoles;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=false)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=10, nullable=false)
     */
    private $lastName;

    /**
     * Add usrRole
     *
     * @param UserRole $usrRole
     *
     * @return User
     */
    public function addUsrRole(UserRole $usrRole)
    {
        $this->usrRoles[] = $usrRole;

        return $this;
    }

    /**
     * Remove usrRole
     *
     * @param UserRole $usrRole
     */
    public function removeUsrRole(UserRole $usrRole)
    {
        $this->usrRoles->removeElement($usrRole);
    }

    /**
     * Get usrRoles
     *
     * @return Collection
     */
    public function getUsrRoles()
    {
        return $this->usrRoles;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set midleName
     *
     * @param string $middleName
     *
     * @return User
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get midleName
     *
     * @return string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    public function __toString()
    {
        return $this->getFirstName().' '.$this->getMiddleName().' '.$this->getLastName();
    }
}

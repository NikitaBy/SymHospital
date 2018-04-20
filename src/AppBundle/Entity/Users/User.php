<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/11/18
 * Time: 11:41 AM
 */

namespace AppBundle\Entity\Users;

use Doctrine\Common\Collections\ArrayCollection;
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




    /**
     * @ORM\OneToMany(targetEntity=UserRole::class, mappedBy="user", cascade={"persist", "remove"})
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

    public function __construct()
    {
       parent::__construct();
       $this->usrRoles=new ArrayCollection();
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
     * Set middleName
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
     * Get middleName
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
        $usrRole->setUser($this);
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsrRoles()
    {
        return $this->usrRoles;
    }
}

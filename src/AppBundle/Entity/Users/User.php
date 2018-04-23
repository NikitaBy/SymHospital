<?php

namespace AppBundle\Entity\Users;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    const ROLE_PATIENT = 'ROLE_PATIENT';
    const ROLE_DOCTOR = 'ROLE_DOCTOR';




    /**
     * @ORM\OneToMany(targetEntity=UserRole::class, mappedBy="user", cascade={"persist", "remove"})
     */
    protected $userRoles; // TODO: use whole words

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
     * @ORM\OneToOne(targetEntity=Patient::class, cascade={"persist", "remove"})
     */
    private $patient;

    /**
     * @ORM\OneToOne(targetEntity=Doctor::class, cascade={"persist", "remove"})
     */
    private $doctor;

    public function __construct()
    {
       parent::__construct();
       $this->userRoles = new ArrayCollection();
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
    public function addUserRole(UserRole $usrRole)
    {
        $this->userRoles[] = $usrRole;
        $usrRole->setUser($this);
        return $this;
    }


    /**
     * Remove usrRole
     *
     * @param UserRole $usrRole
     */
    public function removeUserRole(UserRole $usrRole)
    {
        $this->userRoles->removeElement($usrRole);
    }

    /**
     * Get userRoles
     *
     * @return Collection
     */
    public function getUserRoles()
    {
        return $this->userRoles;
    }

    /**
     * Set patient
     *
     * @param Patient $patient
     *
     * @return User
     */
    public function setPatient(Patient $patient = null)
    {
        $this->patient = $patient;

        return $this;
    }

    /**
     * Get patient
     *
     * @return Patient
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set doctor
     *
     * @param Doctor $doctor
     *
     * @return User
     */
    public function setDoctor(Doctor $doctor = null)
    {
        $this->doctor = $doctor;

        return $this;
    }

    /**
     * Get doctor
     *
     * @return Doctor
     */
    public function getDoctor()
    {
        return $this->doctor;
    }
}

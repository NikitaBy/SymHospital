<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Users\User;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Doctrine\UserManager;

class UserRepository extends EntityRepository
{
    /**
     * @var PatientRepository
     */
    protected $patientRepository;

    /**
     * @var DoctorRepository
     */
    protected $doctorRepository;

    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @param PatientRepository $patientRepository
     */
    public function setPatientRepository(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function setDoctorRepository(DoctorRepository $doctorRepository): void
    {
        $this->doctorRepository = $doctorRepository;
    }

    /**
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager): void
    {
        $this->userManager = $userManager;
    }

    /** @param User $user */
    public function save(User $user)
    {
        $userRoles = $user->getUserRoles();

        foreach ($userRoles as $userRole)
        {
            if ($userRole->getRole()->getCode() === User::ROLE_PATIENT && !$user->isPatient())
            {
                $this->patientRepository->create($user);
            }
            if ($userRole->getRole()->getCode() === User::ROLE_DOCTOR && !$user->isDoctor())
            {
                $this->doctorRepository->create($user);
            }
        }

        $this->userManager->updateUser($user);
    }

    public function delete(User $user)
    {
        $this->userManager->deleteUser($user);
    }
}
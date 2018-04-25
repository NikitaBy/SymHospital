<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Patient;
use AppBundle\Entity\Users\Role;
use AppBundle\Entity\Users\User;
use AppBundle\Entity\Users\UserRole;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserManager;

class PatientRepository extends EntityRepository
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param User|null $user
     *
     * @return Patient
     */
    public function create(User $user = null)
    {
        $patient = new Patient();

        if (!$user) {
            $user = $this->userManager->createUser();
            $user->setEnabled(true);

            $role = $this->getEntityManager()->getRepository(Role::class)->findOneBy(['code' => Role::ROLE_PATIENT]);

            $userRole = new UserRole();
            $userRole->setRole($role);
            $user->addUserRole($userRole);
        }

        $patient->setUser($user);

        return $patient;
    }

    /**
     * @param Patient $patient
     */
    public function save(Patient $patient)
    {
        $this->userManager->updateUser($patient->getUser());
    }

    /**
     * @param Patient $patient
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Patient $patient)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($patient);
        $entityManager->flush($patient);
    }

}
<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Patient;
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
     * @return Patient
     */
    public function create()
    {
        $patient= new Patient();
        
        $user = $this->userManager->createUser();
        $user->setEnabled(true);


        $patient->setUser($user);
        $user->setPatient($patient);

        $role = $this->getEntityManager()->getRepository('AppBundle:Users\Role')->findOneBy(['id'=>'1']); // TODO: get from repository by code / magic
        $userRole = new UserRole();

        $userRole->setRole($role);
        $user->addUserRole($userRole);


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
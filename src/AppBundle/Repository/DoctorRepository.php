<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserManager;

class DoctorRepository extends EntityRepository
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
     * @return Doctor
     */
    public function create()
    {
        $patient= new Doctor();
        $user = $this->userManager->createUser();
        $patient->setUser($user);
        return $patient;
    }

    /**
     * @param Doctor $doctor
     */
    public function save(Doctor $doctor)
    {
        $this->userManager->updateUser($doctor->getUser());
    }

    /**
     * @param Doctor $doctor
     *
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete(Doctor $doctor)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($doctor);
        $entityManager->flush($doctor);
    }

}
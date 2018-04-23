<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Users\UserRole;
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
        $doctor= new Doctor();

        $user = $this->userManager->createUser();

        $doctor->setUser($user);
        $user->setDoctor($doctor);

        $role = $this->getEntityManager()->getRepository('AppBundle:Users\Role')->findOneBy(['id'=>'2']); // TODO: get from repository by code / magic
        $userRole = new UserRole();

        $userRole->setRole($role);
        $user->addUserRole($userRole);


        return $doctor;
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
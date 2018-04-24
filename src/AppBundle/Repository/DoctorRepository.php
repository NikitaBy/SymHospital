<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Users\Role;
use AppBundle\Entity\Users\User;
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
     * @param User|null $user
     *
     * @return Doctor
     */
    public function create(User $user=null)
    {
        $doctor= new Doctor();

        if(!$user) {
            $user = $this->userManager->createUser();

            $role = $this->getEntityManager()->getRepository('AppBundle:Users\Role')->findOneBy(['code' => Role::ROLE_DOCTOR]);

            $userRole = new UserRole();
            $userRole->setRole($role);
            $user->addUserRole($userRole);
        }

        $doctor->setUser($user);
        $user->setDoctor($doctor);

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
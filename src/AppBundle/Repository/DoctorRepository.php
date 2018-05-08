<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Users\Role;
use AppBundle\Entity\Users\User;
use AppBundle\Entity\Users\UserRole;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\UserManager;

class DoctorRepository extends EntityRepository
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /** @var EntityManager */
    private $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param string $alias
     * @param null $indexBy
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createQueryBuilder($alias = 'Doctor', $indexBy = null)
    {
        return parent::createQueryBuilder($alias, $indexBy);
    }

    /**
     * @param User|null $user
     *
     * @return Doctor
     */
    public function create(User $user=null)
    {
        $doctor= new Doctor();
        $hasRole = false;

        if (!$user) {
            $user = $this->userManager->createUser();
        }
        else{
            foreach ($user->getUserRoles() as $userRole){
                if($userRole->getRole()->isDoctorRole()){
                    $hasRole=true;
                    break;
                }
            }
        }



        if(!$hasRole) {
            $role = $this->getEntityManager()->getRepository('AppBundle:Users\Role')->findOneBy(['code' => Role::ROLE_DOCTOR]);

            $userRole = new UserRole();
            $userRole->setRole($role);
            $user->addUserRole($userRole);
        }

        $doctor->setUser($user);

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

    /**
     * @param int $specialty
     *
     * @return array
     */
    public function selectBySpecialty(int $specialty)
    {
        $qb=$this->createQueryBuilder();
        $qb->where(':specialty MEMBER OF Doctor.specialty');
        $qb->setParameter(':specialty', $specialty);
        return $qb->getQuery()->getResult();
    }

    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Doctor::class)->find($id);
    }


}
<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Patient;
use AppBundle\Entity\Users\User;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Doctrine\UserManager;

class UserRepository extends EntityRepository
{
    /**
     * @var UserManager
     */
    protected $userManager;

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
        $this->userManager->updateUser($user);

        $userRoles=$user->getUserRoles();

        foreach ($userRoles as $role)
        {
            if(strcmp($role->getRole()->getCode(), User::ROLE_PATIENT)===0 && $user->getPatient()===null)
            {
                $patient=new Patient();
                $user->setPatient($patient);
                $patient->setUser($user);
                break;
            }
        }


    }

}
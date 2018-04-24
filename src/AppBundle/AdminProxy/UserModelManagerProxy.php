<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/18/18
 * Time: 2:11 PM
 */

namespace AppBundle\AdminProxy;

use AppBundle\Repository\UserRepository;
use Doctrine\Common\Util\ClassUtils;
use Doctrine\DBAL\DBALException;
use FOS\UserBundle\Doctrine\UserManager;
use Sonata\AdminBundle\Exception\ModelManagerException;

use Sonata\DoctrineORMAdminBundle\Model\ModelManager;

class UserModelManagerProxy extends ModelManager
{
    /**
     * @var UserManager
     */
    private $userManager;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param UserRepository $userRepository
     */
    public function setUserRepository(UserRepository $userRepository): void
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param $object
     *
     * @throws ModelManagerException
     */
    public function create($object)
    {
        try {
            $this->userRepository->save($object);
        } catch (\PDOException $e) {
            throw new ModelManagerException(
                sprintf('Failed to create object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        } catch (DBALException $e) {
            throw new ModelManagerException(
                sprintf('Failed to create object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @param $object
     *
     * @throws ModelManagerException
     */
    public function update($object)
    {
        try {
            $this->userManager->updateUser($object);
        } catch (\PDOException $e) {
            throw new ModelManagerException(
                sprintf('Failed to update object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        } catch (DBALException $e) {
            throw new ModelManagerException(
                sprintf('Failed to update object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        }
    }

    /**
     * @param $object
     *
     * @throws ModelManagerException
     */
    public function delete($object)
    {
        try {
            $this->userManager->deleteUser($object);
        } catch (\PDOException $e) {
            throw new ModelManagerException(
                sprintf('Failed to delete object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        } catch (DBALException $e) {
            throw new ModelManagerException(
                sprintf('Failed to delete object: %s', ClassUtils::getClass($object)),
                $e->getCode(),
                $e
            );
        }
    }
}
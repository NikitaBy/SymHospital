<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/18/18
 * Time: 2:11 PM
 */

namespace AppBundle\AdminProxy;

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
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function create($object)
    {
        try {
            $this->userManager->createUser();
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
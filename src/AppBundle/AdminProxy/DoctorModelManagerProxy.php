<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/19/18
 * Time: 2:49 PM
 */

namespace AppBundle\AdminProxy;

use AppBundle\Repository\DoctorRepository;
use Doctrine\Common\Util\ClassUtils;
use Doctrine\DBAL\DBALException;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Sonata\DoctrineORMAdminBundle\Model\ModelManager;

class DoctorModelManagerProxy extends ModelManager
{
    /**
     * @var DoctorRepository
     */
    private $doctorRepository;

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function setDoctorRepository(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository=$doctorRepository;
    }

    /**
     * @param $object
     *
     * @throws ModelManagerException
     */
    public function create($object)
    {
        try {
            $this->doctorRepository->create();
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
            $this->doctorRepository->save($object);
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
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete($object)
    {
        try {
            $this->doctorRepository->delete($object);
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
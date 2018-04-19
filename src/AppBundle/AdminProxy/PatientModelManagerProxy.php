<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/18/18
 * Time: 6:19 PM
 */

namespace AppBundle\AdminProxy;

use AppBundle\Repository\PatientRepository;
use Doctrine\Common\Util\ClassUtils;
use Doctrine\DBAL\DBALException;
use Sonata\AdminBundle\Exception\ModelManagerException;
use Sonata\DoctrineORMAdminBundle\Model\ModelManager;

class PatientModelManagerProxy extends ModelManager
{
    /**
     * @var PatientRepository
     */
    private $patientRepository;

    /**
     * @param PatientRepository $patientRepository
     */
    public function setPatientRepository(PatientRepository $patientRepository)
    {
        $this->patientRepository=$patientRepository;
    }

    public function create($object)
    {
        try {
            $this->patientRepository->create();
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
            $this->patientRepository->save($object);
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
     * @param mixed $object
     *
     * @throws ModelManagerException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function delete($object)
    {
        try {
            $this->patientRepository->delete($object);
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
<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Patient;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;


class PatientAdmin extends AbstractAdmin
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

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user.firstName');
        $formMapper->add('user.middleName');
        $formMapper->add('user.lastName');
        $formMapper->add('user.username');
        $formMapper->add('user.email');
        $formMapper->add('user.password');
        $formMapper->add('birthDate', DatePickerType::class, array('format'=>'yyyy-MMM-dd'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('user.firstName');
        $datagridMapper->add('user.middleName');
        $datagridMapper->add('user.lastName');
        $datagridMapper->add('birthDate');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('user.firstName');
        $listMapper->add('user.middleName');
        $listMapper->add('user.lastName');
        $listMapper->add('birthDate', 'date');//, ['format'=>'d-M-Y']);
        $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);

    }

    public function getNewInstance()
    {
        /** @var Patient $patient */
        $patient =  parent::getNewInstance();
        $user = $this->userManager->createUser();
        $patient->setUser($user);
        return $patient;
    }
}
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 10.03.2018
 * Time: 14:24
 */
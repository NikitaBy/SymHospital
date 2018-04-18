<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Patient;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PatientAdmin extends AbstractAdmin
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @var UserPasswordEncoderInterface
     */
    protected $encoder;

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
        $formMapper->add('user.plainPassword', TextType::class);
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
        //$this->userManager->updatePassword($user);
        $patient->setUser($user);
        return $patient;
    }
}

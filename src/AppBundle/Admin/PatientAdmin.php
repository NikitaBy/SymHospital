<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Patient;
use AppBundle\Repository\PatientRepository;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PatientAdmin extends AbstractAdmin
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @var PatientRepository
     */
    protected $patientRepository;

    /**
     * @param UserManager $userManager
     */
    public function setUserManager(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    /**
     * @param PatientRepository $patientRepository
     */
    public function setPatientRepository(PatientRepository $patientRepository): void
    {
        $this->patientRepository = $patientRepository;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user.firstName');
        $formMapper->add('user.middleName');
        $formMapper->add('user.lastName');
        $formMapper->add('user.username');
        $formMapper->add('user.email');
        $formMapper->add('user.plainPassword', TextType::class, ['required'=>false]);
        $formMapper->add('birthDate', DatePickerType::class, array('format'=>'yyyy-MMM-dd', 'required'=>true));
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

    /**
     * @return Patient|mixed
     */
    public function getNewInstance()
    {
        return $this->patientRepository->create();
    }
}

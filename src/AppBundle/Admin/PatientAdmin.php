<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Patient;
use AppBundle\Repository\PatientRepository;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Knp\Menu\ItemInterface as MenuItemInterface;


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
     * @var Router
     */
    protected $router;

    /**
     * @param Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }


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
        $formMapper->with('User');
                        $formMapper->add('user.firstName');
                        $formMapper->add('user.middleName');
                        $formMapper->add('user.lastName');
                        $formMapper->add('user.username');
                        $formMapper->add('user.email');
                        $formMapper->add('user.plainPassword', TextType::class, ['required'=>false]);
        $formMapper->end();
        $formMapper->with('Patient');
        $formMapper->add('birthDate', DatePickerType::class, array('format'=>'yyyy-MMM-dd', 'required'=>true));
        $formMapper->end();
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
     * @param MenuItemInterface $menu
     * @param string $action
     * @param AdminInterface|null $childAdmin
     *
     * @return void
     */
    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        $patient = $this->getSubject();
        if ($patient) {
            if ($user = $patient->getUser()) {
                $menu->addChild(
                    'User',
                    [
                        'uri' => $this->router->generate('admin_app_users_user_edit', ['id' => $user->getId()])
                    ]
                );
            }
        }
    }


    /**
     * @return Patient|mixed
     */
    public function getNewInstance()
    {
        return $this->patientRepository->create();
    }
}

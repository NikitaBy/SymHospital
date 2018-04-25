<?php

namespace AppBundle\Admin\User;

use AppBundle\Entity\Users\User;
use Knp\Menu\ItemInterface as MenuItemInterface;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class UserAdmin
 *
 * @method User getSubject()
 */
class UserAdmin extends AbstractAdmin
{
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
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstName');
        $formMapper->add('middleName');
        $formMapper->add('lastName');
        $formMapper->add('username');
        $formMapper->add('email');
        $formMapper->add('plainPassword', TextType::class, ['required'=>false]);
        $formMapper->add(
            'userRoles',
            CollectionType::class,
            [
                'by_reference'=>false,
            ],
            [
                'edit'=>'inline',
                'inline'=>'table'
            ]
        );
        $formMapper->add('enabled');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstName');
        $datagridMapper->add('middleName');
        $datagridMapper->add('lastName');
        $datagridMapper->add('username');
        $datagridMapper->add('email');
        $datagridMapper->add('password');
        $datagridMapper->add('userRoles');
        $datagridMapper->add('enabled');
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('id');
        $listMapper->add('firstName');
        $listMapper->add('middleName');
        $listMapper->add('lastName');
        $listMapper->add('username');
        $listMapper->add('email');
        $listMapper->add('password');
        $listMapper->add('userRoles');
        $listMapper->add('enabled');
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
        $user = $this->getSubject();
        if ($user) {
            if ($patient = $user->getPatient()) {
                $menu->addChild(
                    'Patient',
                    [
                        'uri' => $this->router->generate('admin_app_patient_edit', ['id' => $patient->getId()])
                    ]
                );
            }
            if ($doctor = $user->getDoctor()) {
                $menu->addChild(
                    'Doctor',
                    [
                        'uri' => $this->router->generate('admin_app_doctor_edit', ['id' => $doctor->getId()])
                    ]
                );
            }
        }
    }

    protected $datagridValues =[
        '_sort_order'=>'DESC',
        '_sort_by'=>'id',
    ];
}


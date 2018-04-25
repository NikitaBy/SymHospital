<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Specialty;
use AppBundle\Repository\DoctorRepository;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Knp\Menu\ItemInterface as MenuItemInterface;


use AppBundle\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Class DoctorAdmin
 *
 * @method Doctor getSubject()
 */
class DoctorAdmin extends AbstractAdmin
{
    /**
     * @var UserManager
     */
    protected $userManager;

    /**
     * @var DoctorRepository
     */
    protected $doctorRepository;

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
     * @param DoctorRepository $doctorRepository
     */
    public function setDoctorRepository(DoctorRepository $doctorRepository): void
    {
        $this->doctorRepository = $doctorRepository;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('General');
            $formMapper->add('user.firstName');
            $formMapper->add('user.middleName');
            $formMapper->add('user.lastName');
            $formMapper->add('user.username');
            $formMapper->add('user.email');
            $formMapper->add('user.plainPassword', TextType::class, ['required'=>false]);
        $formMapper->end();
        $formMapper->with('Doctor');
        $formMapper->add('room', EntityType::class, [
            'multiple' => true,
            'class' => Room::class,
        ]);
        $formMapper->add('specialty', EntityType::class, [
            'multiple' => true,
            'class' => Specialty::class,
        ]);
        $formMapper->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('user.firstName');
        $datagridMapper->add('user.middleName');
        $datagridMapper->add('user.lastName');
        $datagridMapper->add('room');
        $datagridMapper->add('specialty');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('user.firstName');
        $listMapper->add('user.middleName');
        $listMapper->add('user.lastName');
        $listMapper->add('room');
        $listMapper->add('specialty');
        $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);

    }

    /**
     * @param MenuItemInterface $menu
     * @param string $action
     * @param AdminInterface|null $childAdmin
     *
     * @return mixed|void
     */
    protected function configureTabMenu(MenuItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {
        $doctor = $this->getSubject();
        if ($doctor && $doctor->getId() && $user = $doctor->getUser()) {
            $menu->addChild(
                'User',
                [
                    'uri' => $this->router->generate('admin_app_users_user_edit', ['id' => $user->getId()])
                ]
            );
        }
    }


    public function getNewInstance()
    {
        return $this->doctorRepository->create();
    }
}

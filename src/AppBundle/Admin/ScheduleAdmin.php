<?php
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 18.03.2018
 * Time: 14:04
 */

namespace AppBundle\Admin;


use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Knp\Menu\ItemInterface as MenuItemInterface;

class ScheduleAdmin extends AbstractAdmin
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

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('day', DatePickerType::class, array('format'=>'dd-MMM-yyyy'));
        $formMapper->add('timeStart', TimeType::class);
        $formMapper->add('timeEnd', TimeType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('doctor');
        $datagridMapper->add('day');
        $datagridMapper->add('timeStart');
        $datagridMapper->add('timeEnd');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('doctor');
        $listMapper->add('day');
        $listMapper->add('timeStart');
        $listMapper->add('timeEnd');
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
        $schedule = $this->getSubject();
        if ($schedule && $schedule->getId() && $doctor = $schedule->getDoctor()) {
            $menu->addChild(
                'Doctor',
                [
                    'uri' => $this->router->generate('admin_app_doctor_edit', ['id' => $doctor->getId()])
                ]
            );
        }
    }

}
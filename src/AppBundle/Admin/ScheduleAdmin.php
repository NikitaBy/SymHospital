<?php
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 18.03.2018
 * Time: 14:04
 */

namespace AppBundle\Admin;


use AppBundle\Repository\ScheduleRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DateTimePickerType;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Knp\Menu\ItemInterface as MenuItemInterface;

class ScheduleAdmin extends AbstractAdmin
{
    /**
     * @var Router
     */
    protected $router;

    /** @var ScheduleRepository */
    protected $scheduleRepository;

    /**
     * @param Router $router
     */
    public function setRouter(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @param ScheduleRepository $scheduleRepository
     */
    public function setScheduleRepository(ScheduleRepository $scheduleRepository)
    {
        $this->scheduleRepository = $scheduleRepository;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('timeStart', DateTimePickerType::class, ['format'=>'dd-MMM-yyyy H:mm']);
        $formMapper->add('timeEnd', DateTimePickerType::class, ['format'=>'dd-MMM-yyyy H:mm']);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('doctor');
        $datagridMapper->add('timeStart');
        $datagridMapper->add('timeEnd');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('doctor');
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

    //TODO Delete unnecessary cascades
}
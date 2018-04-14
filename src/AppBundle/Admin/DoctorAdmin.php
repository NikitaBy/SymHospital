<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Specialty;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AppBundle\Entity\Room;

class DoctorAdmin extends AbstractAdmin
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
        $formMapper->add('room', EntityType::class, [
            'multiple' => true,
            'class' => Room::class,
        ]);
        $formMapper->add('specialty', EntityType::class, [
            'multiple' => true,
            'class' => Specialty::class,
        ]);
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

    public function getNewInstance()
    {
        /**@var Doctor $doctor*/
        $doctor = parent::getNewInstance();
        $user=$this->userManager->createUser();
        $doctor->setUser($user);
        return $doctor;
    }
}

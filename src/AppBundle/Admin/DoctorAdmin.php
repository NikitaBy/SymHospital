<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Specialty;
use AppBundle\Repository\DoctorRepository;
use FOS\UserBundle\Model\UserManager;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use AppBundle\Entity\Room;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
        $formMapper->add('user.firstName');
        $formMapper->add('user.middleName');
        $formMapper->add('user.lastName');
        $formMapper->add('user.username');
        $formMapper->add('user.email');
        $formMapper->add('user.plainPassword', TextType::class, ['required'=>false]);
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
        return $this->doctorRepository->create();
    }
}

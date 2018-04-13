<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Specialty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use AppBundle\Entity\Room;

class DoctorAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('user.firstName', TextType::class);
        $formMapper->add('user.middleName', TextType::class);
        $formMapper->add('user.lastName', TextType::class);
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
        $listMapper->add('First Name');
        $listMapper->add('Middle Name');
        $listMapper->add('Last Name');
        $listMapper->add('room');
        $listMapper->add('specialty');
    }
}

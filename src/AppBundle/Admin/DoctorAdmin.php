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
        $formMapper->add('app.user.firstName', TextType::class);
        $formMapper->add('app.user.middleName', TextType::class);
        $formMapper->add('app.user.lastName', TextType::class);
        $formMapper->add('room', EntityType::class, [
            'multiple' => true,
            'class' => Room::class,
            //'property' => 'number',
        ]);
        $formMapper->add('specialty', EntityType::class, [
            'multiple' => true,
            'class' => Specialty::class,
            //'property' => 'spec',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('app.user.firstName');
        $datagridMapper->add('app.user.middleName');
        $datagridMapper->add('app.user.lastName');
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

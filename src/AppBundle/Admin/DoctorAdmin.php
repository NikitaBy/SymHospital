<?php
namespace AppBundle\Admin;

use AppBundle\Entity\Specialty;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use AppBundle\Entity\Room;

class DoctorAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstname', TextType::class);
        $formMapper->add('midlname', TextType::class);
        $formMapper->add('lastname', TextType::class);
        $formMapper->add('room', ModelType::class, [
            'multiple' => true,
            'class' => Room::class,
            'property' => 'number',
        ]);
        $formMapper->add('specialty', ModelType::class, [
            'multiple' => true,
            'class' => Specialty::class,
            'property' => 'spec',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstname');
        $datagridMapper->add('midlname');
        $datagridMapper->add('lastname');
        $datagridMapper->add('room');
        $datagridMapper->add('specialty');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('firstName');
        $listMapper->add('midlName');
        $listMapper->add('lastName');
        $listMapper->add('room');
        $listMapper->add('specialty');
    }
}

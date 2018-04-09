<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Room;

class DoctorAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstname', TextType::class);
        $formMapper->add('midlname', TextType::class);
        $formMapper->add('lastname', TextType::class);
        $formMapper->add('room', ModelType::class, [
            'class' => Room::class,
            'property' => 'number',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstname');
        $datagridMapper->add('midlname');
        $datagridMapper->add('lastname');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('firstName');
        $listMapper->addIdentifier('midlName');
        $listMapper->addIdentifier('lastName');
    }
}

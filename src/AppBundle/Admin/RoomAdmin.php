<?php
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 18.03.2018
 * Time: 14:04
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Equipment;



class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper->add('number', IntegerType::class);
        $formMapper->add('type', TextType::class);

        $formMapper->add('equipment', EntityType::class, [
            'class' => Equipment::class,
            'choice_label' => 'name',
        ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('number');
        $datagridMapper->add('type');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('number');
        $listMapper->add('type');
    }
}
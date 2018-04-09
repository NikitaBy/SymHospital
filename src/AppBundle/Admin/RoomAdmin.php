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
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use AppBundle\Entity\Equipment;



class RoomAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {


        $formMapper->add('number', IntegerType::class);
        $formMapper->add('type', TextType::class);

        $formMapper->add('equipment', ModelType::class, [
          //  'multiple' => true,
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
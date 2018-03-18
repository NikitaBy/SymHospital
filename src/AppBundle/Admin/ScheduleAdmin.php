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

class ScheduleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('day', TextType::class);
        $formMapper->add('worktime', TextType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('day');
        $datagridMapper->add('worktime');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('day');
        $listMapper->add('worktime');
    }
}
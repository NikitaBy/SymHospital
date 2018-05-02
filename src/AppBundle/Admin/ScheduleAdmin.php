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
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class ScheduleAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('day', DatePickerType::class, array('format'=>'dd-MMM-yyyy'));
        $formMapper->add('timeStart', TimeType::class);
        $formMapper->add('timeEnd', TimeType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('doctor');
        $datagridMapper->add('day');
        $datagridMapper->add('timeStart');
        $datagridMapper->add('timeEnd');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('doctor');
        $listMapper->add('day');
        $listMapper->add('timeStart');
        $listMapper->add('timeEnd');
        $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);
    }
}
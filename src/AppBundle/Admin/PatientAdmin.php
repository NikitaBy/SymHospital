<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class PatientAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('app.user.firstName', TextType::class);
        $formMapper->add('app.user.middleName', TextType::class);
        $formMapper->add('app.user.lastName', TextType::class);
        $formMapper->add('age', DatePickerType::class, array('format'=>'yyyy-MMM-dd'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('app.user.firstName');
        $datagridMapper->add('app.user.middleName');
        $datagridMapper->add('app.user.lastName');
        $datagridMapper->add('age');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('First Name');
        $listMapper->add('Middle Name');
        $listMapper->add('Last Name');
        $listMapper->add('Age', 'date', ['format'=>'d-M-Y']);

    }


}
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 10.03.2018
 * Time: 14:24
 */
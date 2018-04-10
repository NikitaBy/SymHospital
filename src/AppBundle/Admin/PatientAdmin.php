<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class PatientAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstname', TextType::class);
        $formMapper->add('midlname', TextType::class);
        $formMapper->add('lastname', TextType::class);
        $formMapper->add('age', DateType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstname');
        $datagridMapper->add('midlname');
        $datagridMapper->add('lastname');
        $datagridMapper->add('age');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('First Name');
        $listMapper->add('Midl Name');
        $listMapper->add('Last Name');
        $listMapper->add('Age', 'date', ['format'=>'F Y']);
    }


}
/**
 * Created by PhpStorm.
 * User: zastr
 * Date: 10.03.2018
 * Time: 14:24
 */
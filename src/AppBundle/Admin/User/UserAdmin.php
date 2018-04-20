<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 4/14/18
 * Time: 3:24 PM
 */

namespace AppBundle\Admin\User;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\CoreBundle\Form\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('firstName');
        $formMapper->add('middleName');
        $formMapper->add('lastName');
        $formMapper->add('username');
        $formMapper->add('email');
        $formMapper->add('plainPassword', TextType::class, ['required'=>false]);
        $formMapper->add('usrRoles', CollectionType::class,
                        [
                            'by_reference'=>false,
                        ],
                        [
                            'edit'=>'inline',
                            'inline'=>'table'
                        ]);
        $formMapper->add('enabled');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('firstName');
        $datagridMapper->add('middleName');
        $datagridMapper->add('lastName');
        $datagridMapper->add('username');
        $datagridMapper->add('email');
        $datagridMapper->add('password');
        $datagridMapper->add('usrRoles');
        $datagridMapper->add('enabled');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('firstName');
        $listMapper->add('middleName');
        $listMapper->add('lastName');
        $listMapper->add('username');
        $listMapper->add('email');
        $listMapper->add('password');
        $listMapper->add('usrRoles');
        $listMapper->add('enabled');
        $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);
    }

}


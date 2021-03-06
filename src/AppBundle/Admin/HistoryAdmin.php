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

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Patient;
use AppBundle\Entity\Doctor;
use AppBundle\Entity\Symptom;
use AppBundle\Entity\Disease;
use AppBundle\Entity\Medicine;

class HistoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('patient', EntityType::class, [
            'class' => Patient::class,
            'choice_label' => 'user.lastName',
        ]);
        $formMapper->add('doctor', EntityType::class, [
            'multiple'=>true,
            'class' => Doctor::class,
            'choice_label' => 'user.lastName',

            //            'choice_label' => function (Doctor $doctor)
//            {
//                return $doctor->getUser();
//            },
        ]);
        $formMapper->add('symptoms', EntityType::class, [
            'multiple'=>true,
            'class' => Symptom::class,
            'choice_label' => 'description',
        ]);
        $formMapper->add('disease', EntityType::class, [
            'multiple'=>true,
            'class' => Disease::class,
           // 'choice_label' => 'name',
        ]);
        $formMapper->add('medicine', EntityType::class, [
            'multiple'=>true,
            'class' => Medicine::class,
           // 'choice_label' => 'name',
        ]);

        $formMapper->add('visitDate', DatePickerType::class);//, array('format'=>'yyyy-MM-dd'));
        $formMapper->add('curePeriod', DatePickerType::class);//, array('format'=>'yyyy-MM-dd'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('patient');
        $datagridMapper->add('doctor');
        $datagridMapper->add('symptoms');
        $datagridMapper->add('disease');
        $datagridMapper->add('medicine');
        $datagridMapper->add('visitDate', 'doctrine_orm_date', array('field_type'=>'sonata_type_date_picker',));
        $datagridMapper->add('curePeriod', 'doctrine_orm_date', array('field_type'=>'sonata_type_date_picker',));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('patient');
        $listMapper->add('doctor');
        $listMapper->add('symptoms');
        $listMapper->add('disease');
        $listMapper->add('medicine');
        $listMapper->add('visitDate', 'date');//, array('format'=>'d-M-Y'));
        $listMapper->add('curePeriod', 'date');//, array('format'=>'d-M-Y'));
        $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);

    }
}
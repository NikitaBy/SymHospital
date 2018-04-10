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
use AppBundle\Entity\Symptoms;
use AppBundle\Entity\Disease;
use AppBundle\Entity\Medicine;

class HistoryAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {

        $formMapper->add('patient', EntityType::class, [
            'class' => Patient::class,
            'choice_label' => 'lastname',
        ]);
        $formMapper->add('doctor', EntityType::class, [
            'multiple'=>true,
            'class' => Doctor::class,
            'choice_label' => function (Doctor $doctor)
            {
                return $doctor->getLastname();
            },
        ]);
        $formMapper->add('symptoms', EntityType::class, [
            'multiple'=>true,
            'class' => Symptoms::class,
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

        $formMapper->add('visitDate', DatePickerType::class, array('format'=>'yyyy-MM-dd'));
        $formMapper->add('curePeriod', DatePickerType::class, array('format'=>'yyyy-MM-dd'));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('visitDate', 'doctrine_orm_date', array('field_type'=>'sonata_type_date_picker',));
        $datagridMapper->add('curePeriod', 'doctrine_orm_date', array('field_type'=>'sonata_type_date_picker',));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('visitDate');
        $listMapper->add('curePeriod');
    }
}
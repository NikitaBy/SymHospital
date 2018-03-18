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
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
            'class' => Doctor::class,
            'choice_label' => 'lastname',
        ]);
        $formMapper->add('symptoms', EntityType::class, [
            'class' => Symptoms::class,
            'choice_label' => 'description',
        ]);
        $formMapper->add('disease', EntityType::class, [
            'class' => Disease::class,
            'choice_label' => 'name',
        ]);
        $formMapper->add('medicine', EntityType::class, [
            'class' => Medicine::class,
            'choice_label' => 'name',
        ]);

        $formMapper->add('visitDate', DateType::class);
        $formMapper->add('curePeriod', DateType::class);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('visitDate');
        $datagridMapper->add('curePeriod');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->add('visitDate');
        $listMapper->add('curePeriod');
    }
}
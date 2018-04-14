<?php
 namespace AppBundle\Admin;

 use Sonata\AdminBundle\Admin\AbstractAdmin;
 use Sonata\AdminBundle\Datagrid\ListMapper;
 use Sonata\AdminBundle\Datagrid\DatagridMapper;
 use Sonata\AdminBundle\Form\FormMapper;
 use Sonata\CoreBundle\Form\Type\DatePickerType;
 use Symfony\Component\Form\Extension\Core\Type\TimeType;
 use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use AppBundle\Entity\Patient;
 use AppBundle\Entity\Doctor;


 class TicketAdmin extends AbstractAdmin
 {
     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('patient', EntityType::class, [
                 'class' => Patient::class,
                 'choice_label' => 'user.lastName',
             ]);
         $formMapper->add('visitDate', DatePickerType::class, array('format'=>'dd-MMM-yyyy'));
         $formMapper->add('visitTime', TimeType::class);

         $formMapper->add('doctor', EntityType::class, [
             'class' => Doctor::class,
             'choice_label' => 'user.lastName',
         ]);
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         $datagridMapper->add('patient');
         $datagridMapper->add('visitDate');
         $datagridMapper->add('visitTime');
         $datagridMapper->add('doctor');
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->add('patient');
         $listMapper->add('visitDate');
         $listMapper->add('visitTime');
         $listMapper->add('doctor');
         $listMapper->add('doctor.room');
         $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);
     }

 }
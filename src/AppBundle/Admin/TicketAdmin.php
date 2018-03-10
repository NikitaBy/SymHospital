<?php
 namespace AppBundle\Admin;

 use Sonata\AdminBundle\Admin\AbstractAdmin;
 use Sonata\AdminBundle\Datagrid\ListMapper;
 use Sonata\AdminBundle\Datagrid\DatagridMapper;
 use Sonata\AdminBundle\Form\FormMapper;
 use Symfony\Component\Form\Extension\Core\Type\TimeType;
 use Symfony\Component\Form\Extension\Core\Type\DateType;

 use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use AppBundle\Entity\Patient;
 use AppBundle\Entity\Doctor;


 class TicketAdmin extends AbstractAdmin
 {
     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('patient', EntityType::class, [
                 'class' => Patient::class,
                 'choice_label' => 'lastname',
             ]);
         $formMapper->add('visitDate', DateType::class);
         $formMapper->add('visitTime', TimeType::class);

         $formMapper->add('doctor', EntityType::class, [
             'class' => Doctor::class,
             'choice_label' => 'lastname',
         ]);
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         $datagridMapper->add('visitDate');
         $datagridMapper->add('visitTime');
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->add('visitDate');
         $listMapper->add('visitTime');
     }

 }
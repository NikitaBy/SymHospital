<?php
 namespace AppBundle\Admin;

 use AppBundle\Repository\TicketRepository;
 use Sonata\AdminBundle\Admin\AbstractAdmin;
 use Sonata\AdminBundle\Datagrid\ListMapper;
 use Sonata\AdminBundle\Datagrid\DatagridMapper;
 use Sonata\AdminBundle\Form\FormMapper;
 use Sonata\CoreBundle\Form\Type\DateTimePickerType;
 use Symfony\Bridge\Doctrine\Form\Type\EntityType;
 use AppBundle\Entity\Patient;
 use AppBundle\Entity\Doctor;


 class TicketAdmin extends AbstractAdmin
 {
     /** @var TicketRepository */
     protected $ticketRepository;

     /**
      * @param TicketRepository $ticketRepository
      */
     public function setTicketRepository(TicketRepository $ticketRepository)
     {
         $this->ticketRepository = $ticketRepository;
     }

     protected function configureFormFields(FormMapper $formMapper)
     {
         $formMapper->add('patient', EntityType::class, [
                 'class' => Patient::class,
                 'choice_label' => 'user.lastName',
             ]);
         $formMapper->add('visitDate', DateTimePickerType::class, [
                'format'=>'dd-MMM-yyyy H:mm',
            ]);

         $formMapper->add('doctor', EntityType::class, [
             'class' => Doctor::class,
             'choice_label' => 'user.lastName',
         ]);
     }

     protected function configureDatagridFilters(DatagridMapper $datagridMapper)
     {
         $datagridMapper->add('patient');
         $datagridMapper->add('visitDate');
         $datagridMapper->add('doctor');
     }

     protected function configureListFields(ListMapper $listMapper)
     {
         $listMapper->add('patient');
         $listMapper->add('visitDate');
         $listMapper->add('doctor');
         $listMapper->add('doctor.room');
         $listMapper->add('_actions', 'actions', ['actions' => ['edit' => [], 'delete' => []]]);
     }

 }
<?php

namespace AppBundle\Form;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Specialty;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;

class AddTicketForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('specialty', EntityType::class,[
            'class'=>Specialty::class,
            'required'=>true
        ]);
        $builder->add('doctor', EntityType::class, [
            'class'=>Doctor::class,
            'required'=>true
        ]);
        $builder->add('visitDate', DateType::class,[
            'required'=>true,
//            'attr'=> ['class'=>'datepicker']
            ]);
        $builder->add('visitTime',TimeType::class, ['required'=>true]);
    }

    public function getBlockPrefix()
    {
        return 'app_ticket_add';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }

}
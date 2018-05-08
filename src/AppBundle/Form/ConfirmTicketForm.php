<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ConfirmTicketForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('next',
            SubmitType::class,
            [
                'label'=>'View Times',
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_ticket_confirm';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }
}
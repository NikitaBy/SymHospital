<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DateListForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date',
            TextType::class,
            [
                'attr'=>
                    [
                        'class'=>'datepicker'
                    ]
            ]
        );
        $builder->add('next',
            SubmitType::class,
            [
                'label'=>'next'
            ]
        );
    }

    public function getBlockPrefix()
    {
        return 'app_ticket_date_add';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }

}
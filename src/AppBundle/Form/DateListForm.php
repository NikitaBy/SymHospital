<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class DateListForm
 */
class DateListForm extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'date',
            TextType::class,
            [
                'attr' => [
                    'class'=>'datepicker',
                ],
            ]
        );
        $builder->add('next',
            SubmitType::class,
            [
                'label'=>'View Times',
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

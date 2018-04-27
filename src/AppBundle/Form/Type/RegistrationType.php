<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Specialty;
use AppBundle\Entity\Users\Role;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Sonata\CoreBundle\Form\Type\DatePickerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('middleName');
        $builder->add('lastName');
        $builder->add(
            'role',
            EntityType::class,
            [
                'class'=>Role::class,
                'mapped'=>false
            ]
        );
        $builder->add('birthDate', DatePickerType::class,[
//            'widget'=>'single_text',
            'html5'=>false,
//            'format'=>'yyyy-MMM-dd',
            'mapped'=>false,
            'attr'=> ['class'=>'datepicker']
        ]);
        $builder->add('specialty', EntityType::class,[
            'class'=>Specialty::class,
            'multiple'=>true,
            'mapped'=>false
        ]);
    }

    public function getParent()
    {
        return RegistrationFormType::class;
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }

}
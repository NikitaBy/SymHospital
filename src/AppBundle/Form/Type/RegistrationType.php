<?php

namespace AppBundle\Form\Type;

use AppBundle\Entity\Users\Role;
use FOS\UserBundle\Form\Type\RegistrationFormType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName');
        $builder->add('middleName');
        $builder->add('lastName');
        $builder->add(
            'Role',
            EntityType::class,
            [
                'class'=>Role::class,
                'mapped'=>false
            ]
        );
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
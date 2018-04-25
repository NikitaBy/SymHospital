<?php

namespace AppBundle\Controller\User;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegistrationController extends BaseController
{

    private $eventDispatcher;
    private $formFactory;
    private $userManager;
    private $tokenStorage;

    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        FactoryInterface $formFactory,
        UserManagerInterface $userManager,
        TokenStorageInterface $tokenStorage
    ) {
        parent::__construct($eventDispatcher, $formFactory, $userManager, $tokenStorage);
    }

    public function setFormFactory(FactoryInterface $formFactory)
    {
        $this->formFactory=$formFactory;
    }


    public function registerAction(Request $request)
    {
        $myRequest = parent::registerAction($request);

        $form=$this->formFactory->createForm();
        if($form)

        return $myRequest;
    }
}
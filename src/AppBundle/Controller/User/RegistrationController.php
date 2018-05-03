<?php

namespace AppBundle\Controller\User;

use AppBundle\Repository\DoctorRepository;
use AppBundle\Repository\PatientRepository;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Form\Factory\FactoryInterface;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class RegistrationController extends BaseController
{

    private $eventDispatcher;
    private $formFactory;
    private $userManager;
    private $tokenStorage;
    /** @var PatientRepository */
    private $patientRepository;
    /** @var DoctorRepository */
    private $doctorRepository;


    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        FactoryInterface $formFactory,
        UserManagerInterface $userManager,
        TokenStorageInterface $tokenStorage
    ) {
        parent::__construct($eventDispatcher, $formFactory, $userManager, $tokenStorage);
        $this->eventDispatcher = $eventDispatcher;
        $this->formFactory = $formFactory;
        $this->userManager = $userManager;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param Request $request
     *
     * @return null|RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $user = $this->userManager->createUser();
//        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $this->eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $this->formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $this->eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);


                if($form->get('role')->getData()->isPatientRole() && $form->get('birthDate'))
                {
                    $patient = $this->patientRepository->create($user);
                    $this->patientRepository->save($patient);
                    $birthDate =\DateTime::createFromFormat('d-M-Y', $form->get('birthDate')->getData());
                    $patient->setBirthDate($birthDate);
                }
                elseif ($form->get('role')->getData()->isDoctorRole() && $form->get('specialty')->getData()->get('0'))
                {
                    $doctor = $this->doctorRepository->create($user);
                    $doctor->addSpecialty($form->get('specialty')->getData()->get('0'));
                    $this->doctorRepository->save($doctor);
                }

                if (null === $response = $event->getResponse()) {
                    $url = $this->generateUrl('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $this->eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }

            $event = new FormEvent($form, $request);
            $this->eventDispatcher->dispatch(FOSUserEvents::REGISTRATION_FAILURE, $event);

            if (null !== $response = $event->getResponse()) {
                return $response;
            }
        }

        return $this->render('@FOSUser/Registration/register.html.twig', array(
            'form' => $form->createView(),
        ));

    }

    /**
     * @param PatientRepository $patientRepository
     */
    public function setPatientRepository(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function setDoctorRepository(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }
}
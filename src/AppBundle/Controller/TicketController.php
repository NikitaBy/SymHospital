<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Doctor;
use AppBundle\Form\ConfirmTicketForm;
use AppBundle\Form\DateListForm;
use AppBundle\Repository\DoctorRepository;
use AppBundle\Repository\ScheduleRepository;
use AppBundle\Repository\SpecialtyRepository;
use AppBundle\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    /**
     * @return Response
     */
    public function activeTicketsAction()
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $ticketList =  $this->get(TicketRepository::class)->findBy(['patient'=>$user->getPatient()->getId()]);
        $ticketListFiltered = [];

        $currentDate = new \DateTime();

        foreach ($ticketList as $ticket)
        {
            $ticketDate = $ticket->getVisitDate();

            if ($ticketDate > $currentDate) {
                $ticketListFiltered[] = $ticket;
            }
        }


        return $this->render('ticket_list.html.twig', ['ticketList' => $ticketListFiltered]);
    }

    /**
     * @return Response
     */
    public function specialtyAction()
    {
        return $this->render(
            'specialty_list.html.twig',
            ['specialties' => $this->get(SpecialtyRepository::class)->getSpecialties()]
        );
    }

    /**
     * @param int $specialty
     *
     * @return Response
     */
    public function doctorAction(int $specialty)
    {
        return $this->render(
            'doctor_list.html.twig',
            [
                'doctors' => $this->get(DoctorRepository::class)->selectBySpecialty($specialty)
            ]
        );
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @throws \Exception
     */
    public function dateAction(Request $request)
    {
        $form = $this->get('form.factory')->create(DateListForm::class);
        $selectedDoctor = $this->get(DoctorRepository::class)->getById($request->get('doctor'));

        $times=[];

//        dump($selectedDoctor);
//        die;
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $doctorSchedule = $this->get(ScheduleRepository::class)->getScheduleForDay($selectedDoctor, \DateTime::createFromFormat('d-m-Y', $form->get('date')->getData()));
            if ($doctorSchedule){
                $times = $this->get(ScheduleRepository::class)->getTimes($doctorSchedule);
            }

        }

        return $this->render('date_list.html.twig', ['form' => $form->createView(), 'doctor' => $selectedDoctor, 'times'=>$times]);
    }

    public function confirmTicketAction(Request $request)
    {
        $form = $this->get('form.factory')->create(ConfirmTicketForm::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){

        }
    }
}
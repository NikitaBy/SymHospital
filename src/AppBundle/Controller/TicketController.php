<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Specialty;
use AppBundle\Repository\DoctorRepository;
use AppBundle\Repository\SpecialtyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TicketController extends Controller
{
    /** @var SpecialtyRepository */
    protected $specialtyRepository;

    /** @var DoctorRepository */
    protected $doctorRepository;

    /**
     * @param SpecialtyRepository $specialtyRepository
     */
    public function setSpecialtyRepository(SpecialtyRepository $specialtyRepository)
    {
        $this->specialtyRepository = $specialtyRepository;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function activeTicketsAction()
    {

        $entityManager=$this->getDoctrine()->getManager();
        $user=$this->get('security.token_storage')->getToken()->getUser();
        $ticketList=$entityManager->getRepository('AppBundle:Ticket')->findBy(['patient'=>$user->getPatient()->getId()]);

        $ticketListFiltered=array();
        foreach ($ticketList as $ticket)
        {
            $ticketDate=$ticket->getVisitDate()->format("Y-m-d");
            if($ticketDate>date("Y-m-d"))
            {
                $ticketListFiltered[]=$ticket;
            }
        }


        return $this->render('ticket_list.html.twig', ['ticketList'=>$ticketListFiltered]);
    }


    public function specialtyAction()
    {
        return $this->render('specialty_list.html.twig',
            ['specialties'=>$this->specialtyRepository->getSpecialties()]);
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
                'doctors'=>$this->doctorRepository->selectBySpecialty($specialty)
            ]
        );
    }

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function setDoctorRepository(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function dateAction()
    {
        return $this->render('date_list.html.twig');
    }

    public function timeAction()
    {

    }
}
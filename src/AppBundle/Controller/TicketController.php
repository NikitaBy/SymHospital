<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function activeTicketsAction()
    {

        $entityManager=$this->getDoctrine()->getManager();
        /** @var Patient $patient */
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

//    /**
//     * @param EntityManager $entityManager
//     */
//    public function setEntityManager(EntityManager $entityManager): void
//    {
//        $this->entityManager = $entityManager;
//    }
}
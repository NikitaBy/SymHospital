<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserStartController extends Controller
{
    public function indexAction()
    {
        return $this->render('user_start.html.twig');
    }

}
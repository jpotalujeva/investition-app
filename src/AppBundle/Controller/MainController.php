<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{

    public function getCompaniesAction()
    {
        $company = $this->getDoctrine()
            ->getRepository('AppBundle:Company')
            ->findAll();

        return $this->render('@App/Company/index.html.twig', array(
            'companies' => $company
        ));
    }

    public function investAction()
    {
       
    }


    public function LoanAction()
    {
        
    }
}
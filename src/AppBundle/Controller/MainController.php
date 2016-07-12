<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
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

    public function investAction($company)
    {
        $url = $this->generateUrl('invest_to_company', array('company' => $company));
        return $this->render('@App/Company/invest.html.twig', array('company' => $company));
    }


    public function LoanAction($company)
    {
        return $this->render('@App/Company/invest.html.twig', array('company' => $company));
    }
}
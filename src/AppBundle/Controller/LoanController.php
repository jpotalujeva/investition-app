<?php
/**
 * Created by PhpStorm.
 * User: jpota
 * Date: 11.07.2016
 * Time: 21:30
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Loan;
use AppBundle\Form\LoanType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class LoanController extends Controller
{
    public function giveLoanAction(Request $request)
    {
        $loan = new Loan();
        $form = $this->createForm(LoanType::class, $loan);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($loan);
            $em->flush();

            return $this->redirectToRoute('logged_in');
        }

        return $this->render(
            '@App/Loan/index.html.twig' ,array(
                'form' => $form->createView()
            )
        );
    }

   
}
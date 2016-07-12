<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Investment;
use AppBundle\Form\InvestType;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class InvestController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('logged_in');
        }

        return $this->render(
            '@App/Invest/login.html.twig',
            array('form' => $form->createView())
        );
    }

    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'security/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }


    public function mainAction()
    {
        $investment = $this->getDoctrine()
            ->getRepository('AppBundle:Investment')
            ->findAll();
        $loan = $this->getDoctrine()
            ->getRepository('AppBundle:Loan')
            ->findAll();
        $user = $this->getDoctrine()
            ->getRepository('AppBundle:User')
            ->findAll();
        return $this->render(
            '@App/Invest/index.html.twig', array(
            'investments' => $investment,
            'loan' => $loan,
            'user' =>$user
        ));
    }

    public function investAction(Request $request)
    {
        $invest = new Investment();
        $form = $this->createForm(InvestType::class, $invest);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            $invest->setUserId(2);
            $em = $this->getDoctrine()->getManager();
            $em->persist($invest);
            $em->flush();

            return $this->redirectToRoute('logged_in');
        }

        return $this->render(
            '@App/Invest/invest.html.twig' ,array(
                'form' => $form->createView()
            )
        );

    }
    
}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Investment;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
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


    public function mainAction()
    {
        $investment = $this->getDoctrine()
            ->getRepository('AppBundle:Investment')
            ->find($user_id);
        return $this->render(
            '@App/Invest/index.html.twig', array(
            'investments' => $investment,
            'user' => $user_id
        ));
    }
}

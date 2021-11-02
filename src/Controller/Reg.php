<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Reg extends AbstractController
{
    /**
     * @Route("/a", name="reg")
     *  @param Request $request
     * @return RedirectResponse|Response
     */
    public function ins(Request $request)
    {
        $user= new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user->setUsername($user->getUsername());
            $em->persist($user);
            $em->flush();

            $this->addFlash('success', 'You have been successfully registered! Congratulations');

            return $this->redirectToRoute('homepage');
        }

        return $this->render('user/create.html.twig', ['form' => $form->createView()]);
    }
}

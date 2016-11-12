<?php

namespace AppBundle\Controller;

use PasswordBundle\Entity\Password;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $password = new Password;

        $form = $this->createFormBuilder($password)
            ->add('length', RangeType::class, ['label' => 'Length 1-100', 'attr' => ['min' => 1, 'max' => 100]])
            ->add('save', SubmitType::class, ['label' => 'Generate Password'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passwordLength = $form->get('length')->getData();
            $passwordService = $this->get('password.service');
            $password = $passwordService->passwordMaker($passwordLength);
        }else{
            $password = "";
        }


        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'password' => $password
        ]);
    }
}

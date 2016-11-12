<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Password;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     *
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $password = new Password;

        $form = $this->createFormBuilder($password)
            ->add('length', RangeType::class, ['label' => 'Length 1-50', 'attr' => ['min' => 1, 'max' => 50]])
            ->add('letters', CheckboxType::class, ['label' => 'Allow letters?', 'required' => false,])
            ->add('numbers', CheckboxType::class, ['label' => 'Allow numbers?', 'required' => false,])
            ->add('save', SubmitType::class, ['label' => 'Generate Password'])

            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passwordLength = $form->get('length')->getData();
            $allowLetters = $form->get('letters')->getData();
            $allowNumbers = $form->get('numbers')->getData();
            $passwordService = $this->get('password.service');
            $password = $passwordService->passwordMaker($passwordLength, $allowLetters, $allowNumbers);
            $message = "Your password is: ";
        }else{
            $password = "";
            $message = "Please fill in the parameters of your password";
        }


        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
            'password' => $password,
            'message' => $message
        ]);
    }
}

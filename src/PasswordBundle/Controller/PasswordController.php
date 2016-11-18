<?php

namespace PasswordBundle\Controller;


use PasswordBundle\Entity\Password;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;


class PasswordController extends Controller
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
            ->add('length', RangeType::class, ['label' => 'Length 1-50: ', 'attr' => ['min' => 1, 'max' => 50]])
            ->add('letters', CheckboxType::class, ['label' => 'Allow lower case?', 'required' => false,])
            ->add('numbers', CheckboxType::class, ['label' => 'Allow numbers?', 'required' => false,])
            ->add('symbols', CheckboxType::class, ['label' => 'Allow symbols?', 'required' => false,])
            ->add('upperCase', CheckboxType::class, ['label' => 'Allow upper case?', 'required' => false,])
            ->add('memorable', CheckboxType::class, ['label' => 'Make memorable?', 'required' => false,])
            ->add('save', SubmitType::class, ['label' => 'Generate Password'])

            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $passwordLength = $form->get('length')->getData();
            $allowLetters = $form->get('letters')->getData();
            $allowNumbers = $form->get('numbers')->getData();
            $allowSymbols = $form->get('symbols')->getData();
            $memorable = $form->get('memorable')->getData();
            $allowUpperCase = $form->get('upperCase')->getData();
            if (
                $allowLetters === true ||
                $allowNumbers === true ||
                $allowSymbols === true ||
                $allowUpperCase === true
            ) {
                $passwordService = $this->get('password.service');
                $password = $passwordService->passwordMaker($passwordLength, $allowLetters, $allowNumbers,
                    $allowSymbols, $allowUpperCase
                );
                $message = "Your password is: ";
            } elseif ($memorable === true) {
                $passwordService = $this->get('memorable.password.service');
                $password = $passwordService->passwordMaker($passwordLength, $allowLetters, $allowNumbers,
                    $allowSymbols, $allowUpperCase
                );
                $message = "Your password is: ";
            }else {
                $password = "";
                $message = "Please fill in the parameters of your password";
            }
        } else {
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

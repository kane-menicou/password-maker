<?php

namespace PasswordBundle\Controller;

use PasswordBundle\Entity\Password;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PasswordController extends Controller
{
    /**
     * @Route("/password")
     */
    public function password()
    {
        $passwordService = $this->get('password.service');
        $password = $passwordService->passwordMaker(10);
        return $this->render('PasswordBundle:Default:index.html.twig',[
            'password' => $password,
        ]);
    }
}

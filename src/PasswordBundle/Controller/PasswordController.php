<?php

namespace PasswordBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PasswordController extends Controller
{
    /**
     * @Route("/password")
     */
    public function indexAction()
    {
        $passwordService = $this->get('password.service');
        $password = $passwordService->passwordMaker(10);
        return $this->render('PasswordBundle:Default:index.html.twig',[
            'password' => $password,
        ]);
    }
}

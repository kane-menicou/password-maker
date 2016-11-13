<?php

namespace QuickPasswordBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PasswordController extends Controller
{
    /**
     * @Route("/password/{length}")
     */
    public function password($length)
    {
        $passwordService = $this->get('password.service');
        $password = $passwordService->passwordMaker($length, true, true);
        return $this->render('QuickPasswordBundle:Default:index.html.twig',[
            'password' => $password,
        ]);
    }
}

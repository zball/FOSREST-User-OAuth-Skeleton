<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController as Controller;


class UsersController extends Controller
{
    public function getUsersAction()
    {
        $data = [
            'user1' => [
                'username' => 'username1',
                'email' => 'test1@email.com'
            ],
            'user2' => [
                'username' => 'username2',
                'email' => 'test2@email.com'
            ]
        ];

        $view = $this->view($data, 200)
            ->setTemplate("default/users.html.twig")
            ->setTemplateVar('users')
        ;

        return $this->handleView($view);
    }
}

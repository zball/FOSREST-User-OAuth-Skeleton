<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class UsersController extends FOSRestController implements ClassResourceInterface
{
    public function cgetAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repository = $em->getRepository("AppBundle:User");
        $users = $repository->findAll();

        $view = $this->view($users, 200)
            ->setTemplate("default/users.html.twig")
            ->setTemplateVar('users')
        ;


        return $this->handleView($view);
    }

    public function postAction(Request $request){
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        //\Doctrine\Common\Util\Debug::dump($request->getContent());

        $form->handleRequest($request);

        if ($form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user

            $view = $this->view($user, 200);
            return $this->handleView($view);
        }

        return $form->getErrors();
    }
}

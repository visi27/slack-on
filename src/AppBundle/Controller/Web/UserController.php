<?php

/**
 * (c) Evis Bregu <evis.bregu@gmail.com>.
 */

namespace AppBundle\Controller\Web;

use AppBundle\Entity\User;
use AppBundle\Form\UserRegistrationForm;
use AppBundle\Security\LoginFormAuthenticator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class UserController extends Controller
{
    /**
     * @Route("/change_password", name="user_change_password")
     *
     * @param Request $request
     *
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     *
     * @return Response
     * @Security("is_granted('ROLE_USER')")
     *
     */
    public function changePasswordAction(Request $request, UserPasswordEncoderInterface $userPasswordEncoder)
    {
        /**
         * @var User
         */
        $user = $this->getUser();
        if ($request->getMethod() === 'POST') {
            $currentPassword = $request->get('piCurrPass');
            if ($userPasswordEncoder->isPasswordValid($user, $currentPassword)) {
                if ($request->get('piNewPass') === $request->get('piNewPassRepeat')) {
                    $user->setPlainPassword($request->get('piNewPass'));

                    $this->getDoctrine()->getManager()->persist($user);
                    $this->getDoctrine()->getManager()->flush();
                    $this->addFlash('success', 'Fjalekalimi u ndryshuar me sukses');

                    return $this->render('account/dashboard_layout.html.twig');
                }
                $this->addFlash('error', 'Fushat Fjalekalimi i Ri dhe Perserit Fjalekalimin nuk jane njesoj!');
            } else {
                $this->addFlash('error', 'Fjalekalimi aktual qe jus shtypet nuk eshte i sakte!');
            }
        }

        return $this->render('account/change_password.html.twig');
    }

    /**
     * @Route("/user_dashboard", name="user_dashboard")
     *
     * @return Response
     *
     * @internal param Request $request
     *
     * @Security("is_granted('ROLE_USER')")
     */
    public function dashboardAction()
    {
        return $this->render('account/dashboard_layout.html.twig');
    }
}

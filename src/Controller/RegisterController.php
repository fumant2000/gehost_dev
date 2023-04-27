<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use FOS\RestBundle\Context\Context;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

/**
 * @Route("api", name="api_")
 */
class RegisterController extends AbstractFOSRestController
{
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var UserPasswordHasherInterface
     */
    private $passwordHasher;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(UserRepository $userRepository, UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/register", name="register")
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     */
    public function index(Request $request)
    {
        $data = $request->toArray();
        $email = $data['email'];
        $password = $data['password'];

        $user = $this->userRepository->findOneBy([
            'email' => $email,
        ]);

        if (!is_null($user)) {
            return $this->view([
                'message' => 'User already exists'
            ], Response::HTTP_CONFLICT);
        }

        $user = new User();
        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $password
        );
        $user->setEmail($email);
        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $this->view($user, Response::HTTP_CREATED)->setContext((new Context())->setGroups(['user:read']));
    }
}
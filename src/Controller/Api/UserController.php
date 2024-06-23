<?php
namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[('/api')]
class UserController extends AbstractController
{
    #[Route('/users', name: 'api_users_index', methods: ['GET'])]
    public function index(UserRepository $userRepository, SerializerInterface $serializer): JsonResponse
    {
        $users = $userRepository->findAll();
        $data = $serializer->serialize($users, 'json', ['groups' => 'user:read']);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/users', name: 'api_users_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $user = $serializer->deserialize($data, User::class, 'json');
        $em->persist($user);
        $em->flush();

        return new JsonResponse($serializer->serialize($user, 'json', ['groups' => 'user:read']), 201, [], true);
    }

    #[Route('/users/{id}', name: 'api_users_show', methods: ['GET'])]
    public function show(User $user, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->serialize($user, 'json', ['groups' => 'user:read']), 200, [], true);
    }

    #[Route('/users/{id}', name: 'api_users_update', methods: ['PUT'])]
    public function update(Request $request, User $user, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $updatedUser = $serializer->deserialize($data, User::class, 'json', ['object_to_populate' => $user]);
        $em->persist($updatedUser);
        $em->flush();

        return new JsonResponse($serializer->serialize($updatedUser, 'json', ['groups' => 'user:read']), 200, [], true);
    }

    #[Route('/users/{id}', name: 'api_users_delete', methods: ['DELETE'])]
    public function delete(User $user, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($user);
        $em->flush();

        return new JsonResponse(null, 204);
    }
}

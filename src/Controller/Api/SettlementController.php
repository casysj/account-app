<?php
namespace App\Controller\Api;

use App\Entity\Settlement;
use App\Repository\SettlementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class SettlementController extends AbstractController
{
    #[Route('/settlements', name: 'api_settlements_index', methods: ['GET'])]
    public function index(SettlementRepository $settlementRepository, SerializerInterface $serializer): JsonResponse
    {
        $settlements = $settlementRepository->findAll();
        $data = $serializer->serialize($settlements, 'json', ['groups' => 'settlement:read']);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/settlements', name: 'api_settlements_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $settlement = $serializer->deserialize($data, Settlement::class, 'json');
        $em->persist($settlement);
        $em->flush();

        return new JsonResponse($serializer->serialize($settlement, 'json', ['groups' => 'settlement:read']), 201, [], true);
    }

    #[Route('/settlements/{id}', name: 'api_settlements_show', methods: ['GET'])]
    public function show(Settlement $settlement, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->serialize($settlement, 'json', ['groups' => 'settlement:read']), 200, [], true);
    }

    #[Route('/settlements/{id}', name: 'api_settlements_update', methods: ['PUT'])]
    public function update(Request $request, Settlement $settlement, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $updatedSettlement = $serializer->deserialize($data, Settlement::class, 'json', ['object_to_populate' => $settlement]);
        $em->persist($updatedSettlement);
        $em->flush();

        return new JsonResponse($serializer->serialize($updatedSettlement, 'json', ['groups' => 'settlement:read']), 200, [], true);
    }

    #[Route('/settlements/{id}', name: 'api_settlements_delete', methods: ['DELETE'])]
    public function delete(Settlement $settlement, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($settlement);
        $em->flush();

        return new JsonResponse(null, 204);
    }
}

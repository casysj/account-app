<?php

namespace App\Controller\Api;

use App\Entity\Expense;
use App\Repository\ExpenseRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api')]
class ExpenseController extends AbstractController
{
    #[Route('/expenses', name: 'api_expenses_index', methods: ['GET'])]
    public function index(ExpenseRepository $expenseRepository, SerializerInterface $serializer): JsonResponse
    {
        $expenses = $expenseRepository->findAll();
        $data = $serializer->serialize($expenses, 'json', ['groups' => 'expense:read']);

        return new JsonResponse($data, 200, [], true);
    }

    #[Route('/expenses', name: 'api_expenses_create', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $expense = $serializer->deserialize($data, Expense::class, 'json');
        $em->persist($expense);
        $em->flush();

        return new JsonResponse($serializer->serialize($expense, 'json', ['groups' => 'expense:read']), 201, [], true);
    }

    #[Route('/expenses/{id}', name: 'api_expenses_show', methods: ['GET'])]
    public function show(Expense $expense, SerializerInterface $serializer): JsonResponse
    {
        return new JsonResponse($serializer->serialize($expense, 'json', ['groups' => 'expense:read']), 200, [], true);
    }

    #[Route('/expenses/{id}', name: 'api_expenses_update', methods: ['PUT'])]
    public function update(Request $request, Expense $expense, EntityManagerInterface $em, SerializerInterface $serializer): JsonResponse
    {
        $data = $request->getContent();
        $updatedExpense = $serializer->deserialize($data, Expense::class, 'json', ['object_to_populate' => $expense]);
        $em->persist($updatedExpense);
        $em->flush();

        return new JsonResponse($serializer->serialize($updatedExpense, 'json', ['groups' => 'expense:read']), 200, [], true);
    }

    #[Route('/expenses/{id}', name: 'api_expenses_delete', methods: ['DELETE'])]
    public function delete(Expense $expense, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($expense);
        $em->flush();

        return new JsonResponse(null, 204);
    }
}

<?php

namespace App\Service;

use App\Entity\Settlement;
use App\Entity\User;
use App\Repository\ExpenseRepository;
use App\Repository\SettlementRepository;
use Doctrine\ORM\EntityManagerInterface;

class SettlementService
{

    public function __construct(private ExpenseRepository $expenseRepository, private SettlementRepository $settlementRepository, private EntityManagerInterface $entityManager)
    {
    }

    public function calculateMonthlySettlement(\DateTime $month): void
    {
        // 해당 월의 모든 사용자와 지출 내역 가져오기
        $users = $this->entityManager->getRepository(User::class)->findAll();
        $totalExpenses = 0;
        $userExpenses = [];

        // 사용자별 지출 내역 합산
        foreach ($users as $user) {
            $expenses = $this->expenseRepository->findByUserAndMonth($user, $month);
            $userTotal = array_sum(array_map(fn($expense) => $expense->getAmount(), $expenses));
            $userExpenses[$user->getId()] = $userTotal;
            $totalExpenses += $userTotal;
        }

        // 사용자별 부담해야 할 금액 계산
        $equalShare = $totalExpenses / count($users);

        foreach ($users as $user) {
            $userTotal = $userExpenses[$user->getId()];
            $balance = $userTotal - $equalShare;

            // Settlement 엔티티에 저장
            $settlement = new Settlement();
            $settlement->setUser($user);
            $settlement->setMonth($month);
            $settlement->setTotalExpenses($userTotal);
            $settlement->setBalance($balance);

            $this->entityManager->persist($settlement);
        }

        $this->entityManager->flush();
    }

    public function getMonthlySettlement(\DateTime $month): array
    {
        return $this->settlementRepository->findBy(['month' => $month]);
    }
}
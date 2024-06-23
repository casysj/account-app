<?php

namespace App\Entity;

use App\Repository\SettlementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SettlementRepository::class)]
#[ORM\HasLifecycleCallbacks]
class Settlement
{
    use \Gedmo\Timestampable\Traits\Timestampable;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['settlement:read', 'settlement:write'])]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Groups(['settlement:read', 'settlement:write'])]
    private ?\DateTimeInterface $month = null;

    #[ORM\ManyToOne(inversedBy: 'settlements')]
    #[Groups(['settlement:read', 'settlement:write'])]
    private ?User $user = null;

    #[ORM\Column]
    #[Groups(['settlement:read', 'settlement:write'])]
    private ?float $totalExpenses = null;

    #[ORM\Column]
    #[Groups(['settlement:read', 'settlement:write'])]
    private ?float $balance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonth(): ?\DateTimeInterface
    {
        return $this->month;
    }

    public function setMonth(\DateTimeInterface $month): static
    {
        $this->month = $month;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getTotalExpenses(): ?float
    {
        return $this->totalExpenses;
    }

    public function setTotalExpenses(float $totalExpenses): static
    {
        $this->totalExpenses = $totalExpenses;

        return $this;
    }

    public function getBalance(): ?float
    {
        return $this->balance;
    }

    public function setBalance(float $balance): static
    {
        $this->balance = $balance;

        return $this;
    }
}

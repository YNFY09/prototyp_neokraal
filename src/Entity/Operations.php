<?php

namespace App\Entity;

use App\Repository\OperationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OperationsRepository::class)
 */
class Operations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operation_number;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_operation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operations_types;

    /**
     * @ORM\ManyToOne(targetEntity=Accounts::class, inversedBy="operations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $accounts;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOperationNumber(): ?string
    {
        return $this->operation_number;
    }

    public function setOperationNumber(string $operation_number): self
    {
        $this->operation_number = $operation_number;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getDateOperation(): ?\DateTimeInterface
    {
        return $this->date_operation;
    }

    public function setDateOperation(\DateTimeInterface $date_operation): self
    {
        $this->date_operation = $date_operation;

        return $this;
    }

    public function getOperationsTypes(): ?string
    {
        return $this->operations_types;
    }

    public function setOperationsTypes(string $operations_types): self
    {
        $this->operations_types = $operations_types;

        return $this;
    }

    public function getAccounts(): ?Accounts
    {
        return $this->accounts;
    }

    public function setAccounts(?Accounts $accounts): self
    {
        $this->accounts = $accounts;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\AccountsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountsRepository::class)
 */
class Accounts
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
    private $Account_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $creation_date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Account_type;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Statut;

    /**
     * @ORM\OneToOne(targetEntity=User::class, mappedBy="account", cascade={"persist", "remove"})
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     */
    private $sold;

    /**
     * @ORM\OneToMany(targetEntity=Operations::class, mappedBy="accounts")
     */
    private $operations;

    public function __construct()
    {
        $this->operations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountNumber(): ?string
    {
        return $this->Account_number;
    }

    public function setAccountNumber(string $Account_number): self
    {
        $this->Account_number = $Account_number;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creation_date;
    }

    public function setCreationDate(\DateTimeInterface $creation_date): self
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    public function getAccountType(): ?string
    {
        return $this->Account_type;
    }

    public function setAccountType(string $Account_type): self
    {
        $this->Account_type = $Account_type;

        return $this;
    }

    public function getStatut(): ?bool
    {
        return $this->Statut;
    }

    public function setStatut(bool $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        // set the owning side of the relation if necessary
        if ($user->getAccount() !== $this) {
            $user->setAccount($this);
        }

        $this->user = $user;

        return $this;
    }

    public function getSold(): ?float
    {
        return $this->sold;
    }

    public function setSold(float $sold): self
    {
        $this->sold = $sold;

        return $this;
    }

    /**
     * @return Collection|Operations[]
     */
    public function getOperations(): Collection
    {
        return $this->operations;
    }

    public function addOperation(Operations $operation): self
    {
        if (!$this->operations->contains($operation)) {
            $this->operations[] = $operation;
            $operation->setAccounts($this);
        }

        return $this;
    }

    public function removeOperation(Operations $operation): self
    {
        if ($this->operations->removeElement($operation)) {
            // set the owning side to null (unless already changed)
            if ($operation->getAccounts() === $this) {
                $operation->setAccounts(null);
            }
        }

        return $this;
    }
}

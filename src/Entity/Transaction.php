<?php

namespace App\Entity;

use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=TransactionRepository::class)
 * @ApiResource(
* normalizationContext={"groups"={"transaction:read"}},
* denormalizationContext={"groups"={"transaction:write"}}
* )
 */
class Transaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *@Groups({"transaction:read","user:read"})
     */
    private $id;
     /**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
*@Groups({"transaction:read","user:read"})
 */
protected $createdAt;

/**
 * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="transactions")
 * @ORM\JoinColumn(nullable=false)
 * @Groups("transaction:read")
 */
private $offer;

/**
 * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
 * @ORM\JoinColumn(nullable=false)
 * @Groups("transaction:read")
 */
private $user;

/**
 * @ORM\Column(type="integer")
 * @Groups({"transaction:read","user:read"})
 * 
 */
private $amount;

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","user:read"})
 */
private $paymentMode;

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","user:read"})
 */
private $offerType;

/**
 * @ORM\Column(type="integer")
*  @Groups({"transaction:read","user:read"})
 */
private $offerDuration;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getOffer(): ?Offer
    {
        return $this->offer;
    }

    public function setOffer(?Offer $offer): self
    {
        $this->offer = $offer;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getPaymentMode(): ?string
    {
        return $this->paymentMode;
    }

    public function setPaymentMode(string $paymentMode): self
    {
        $this->paymentMode = $paymentMode;

        return $this;
    }

    public function getOfferType(): ?string
    {
        return $this->offerType;
    }

    public function setOfferType(string $offerType): self
    {
        $this->offerType = $offerType;

        return $this;
    }

    public function getOfferDuration(): ?int
    {
        return $this->offerDuration;
    }

    public function setOfferDuration(int $offerDuration): self
    {
        $this->offerDuration = $offerDuration;

        return $this;
    }
}
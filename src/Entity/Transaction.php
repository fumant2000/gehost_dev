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
 * @ORM\ManyToOne(targetEntity=User::class, inversedBy="transactions")
 * @ORM\JoinColumn(nullable=false)
 * @Groups({"transaction:read", "transaction:write", "user:read"})
 */
private $user;

/**
 * @ORM\Column(type="integer")
 * @Groups({"transaction:read","transaction:write", "user:read"})
 * 
 */
private $amount;

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","transaction:write","user:read"})
 */
private $paymentMode;

/**
 * @ORM\Column(type="string", length=255, nullable=true)
 * @Groups({"transaction:read","transaction:write","user:read"})
 */
private $offerType;

/**
 * @ORM\Column(type="integer")
 * @Groups({"transaction:read","transaction:write", "user:read"})
 */
private $offerDuration;

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","transaction:write","user:read"})
 */
private $sourceContact;

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","transaction:write", "user:read"})
 */
private $destinationContact;

/**
 * @ORM\Column(type="string", length=255)
 *@Groups({"transaction:read","transaction:write", "user:read"})
 */
private $requestStatus;

/**
 * @ORM\Column(type="string", length=255, nullable=true)
 * @Groups({"transaction:read","transaction:write","user:read"})
 */
private $transactionDate;

/**
 * @ORM\Column(type="json")
 * @Groups({"transaction:read","transaction:write","user:read"})
 */
private $allResponse = [];

/**
 * @ORM\Column(type="string", length=255)
 * @Groups({"transaction:read","transaction:write", "user:read"})
 */
private $idTransaction;

/**
 * @ORM\ManyToOne(targetEntity=Offer::class, inversedBy="transactions")
 * @ORM\JoinColumn(nullable=false)
 *  @Groups({"transaction:read","transaction:write"})
 */
private $offer;

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
    public function getSourceContact(): ?string
    {
        return $this->sourceContact;
    }

    public function setSourceContact(string $sourceContact): self
    {
        $this->sourceContact = $sourceContact;

        return $this;
    }

    public function getDestinationContact(): ?string
    {
        return $this->destinationContact;
    }

    public function setDestinationContact(string $destinationContact): self
    {
        $this->destinationContact = $destinationContact;

        return $this;
    }

    public function getRequestStatus(): ?string
    {
        return $this->requestStatus;
    }

    public function setRequestStatus(string $requestStatus): self
    {
        $this->requestStatus = $requestStatus;

        return $this;
    }

    public function getTransactionDate(): ?string
    {
        return $this->transactionDate;
    }

    public function setTransactionDate(?string $transactionDate): self
    {
        $this->transactionDate = $transactionDate;

        return $this;
    }

    public function getAllResponse(): ?array
    {
        return $this->allResponse;
    }

    public function setAllResponse(array $allResponse): self
    {
        $this->allResponse = $allResponse;

        return $this;
    }

/**
 * Get the value of idTransaction
 */ 
public function getIdTransaction():? stirng
{
return $this->idTransaction;
}

/**
 * Set the value of idTransaction
 *
 * @return  self
 */ 
public function setIdTransaction($idTransaction)
{
$this->idTransaction = $idTransaction;

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
}
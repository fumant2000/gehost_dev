<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\OfferRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;


/**
 * @ORM\Entity(repositoryClass=OfferRepository::class)
 *  @ApiResource(
 *   normalizationContext={"groups":{"offer:read"}},
*    denormalizationContext={"groups":{"offer:write"}},
 *)
 */
class Offer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"offer:read","transaction:read", "hostingoffer:read","emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read","emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $description;

    /**
     * @ORM\Column(type="float")
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $reduction;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read","emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $price;

    /**
     *  @ORM\Column(type="string", length=255)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $priority;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $renewalPayement;

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $features = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     * @Groups({"offer:read","transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
     */
    private $paymentMethod = [];

      /**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 * @Groups({"offer:read","transaction:read", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read"})
 */
protected $createdAt;

/**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="update")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 * @Groups({"offer:read","transaction:read","hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read"})
 */
protected $updatedAt;

/**
 * @ORM\Column(type="string", length=255)
 *  @Groups({"offer:read", "transaction:read", "offer:write", "hostingoffer:read", "emailoffer:read","promotionoffer:read","domainoffer:read" })
 */
private $type;

/**
 * @ORM\ManyToOne(targetEntity=HostingOffer::class, inversedBy="offers")
 * @Groups({"offer:write"})
 */
private $hosting;

/**
 * @ORM\ManyToOne(targetEntity=PromotionOffer::class, inversedBy="offers")
 * @Groups({"offer:write"})
 */
private $promotion;

/**
 * @ORM\ManyToOne(targetEntity=DomainOffer::class, inversedBy="offers")
 * @Groups({"offer:write"})
 */
private $domain;

/**
 * @ORM\ManyToOne(targetEntity=EmailOffer::class, inversedBy="offers")
 * @Groups({"offer:write"})
 */
private $email;

/**
 * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="offer")
 */
private $transactions;



public function __construct()
{
    $this->users = new ArrayCollection();
    $this->transactions = new ArrayCollection();
}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getReduction(): ?float
    {
        return $this->reduction;
    }

    public function setReduction (float $reduction): self
    {
        $this->reduction = $reduction;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getPriority(): ?string
    {
        return $this->priority;
    }

    public function setPriority(string $priority): self
    {
        $this->priority = $priority;

        return $this;
    }

    public function getRenewalPayement(): ?int
    {
        return $this->renewalPayement;
    }

    public function setRenewalPayement(?int $renewalPayement): self
    {
        $this->renewalPayement = $renewalPayement;

        return $this;
    }

    public function getFeatures(): ?array
    {
        return $this->features;
    }

    public function setFeatures(?array $features): self
    {
        $this->features = $features;

        return $this;
    }

    public function getPaymentMethod(): ?array
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(?array $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
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

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHosting(): ?HostingOffer
    {
        return $this->hosting;
    }

    public function setHosting(?HostingOffer $hosting): self
    {
        $this->hosting = $hosting;

        return $this;
    }

    public function getPromotion(): ?PromotionOffer
    {
        return $this->promotion;
    }

    public function setPromotion(?PromotionOffer $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getDomain(): ?DomainOffer
    {
        return $this->domain;
    }

    public function setDomain(?DomainOffer $domain): self
    {
        $this->domain = $domain;

        return $this;
    }

    public function getEmail(): ?EmailOffer
    {
        return $this->email;
    }

    public function setEmail(?EmailOffer $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, Transaction>
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setOffer($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            // set the owning side to null (unless already changed)
            if ($transaction->getOffer() === $this) {
                $transaction->setOffer(null);
            }
        }

        return $this;
    }


}
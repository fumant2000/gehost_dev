<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PromotionOfferRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ApiResource(
 *  normalizationContext={"groups":{"promotionoffer:read"}},
*   denormalizationContext={"groups":{"promotionoffer:write"}},
 * )
 * @ORM\Entity(repositoryClass=PromotionOfferRepository::class)
 */
class PromotionOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"promotionoffer:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promotionoffer:read", "promotionoffer:write", })
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"promotionoffer:read", "promotionoffer:write", })
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"promotionoffer:read", "promotionoffer:write", })
     */
    private $duration;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="promotion")
     *  @Groups({"promotionoffer:read"})
     */
    private $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(?int $duration): self
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return Collection<int, Offer>
     */
    public function getOffers(): Collection
    {
        return $this->offers;
    }

    public function addOffer(Offer $offer): self
    {
        if (!$this->offers->contains($offer)) {
            $this->offers[] = $offer;
            $offer->setPromotion($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getPromotion() === $this) {
                $offer->setPromotion(null);
            }
        }

        return $this;
    }
}
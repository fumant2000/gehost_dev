<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmailOfferRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ApiResource(
 *  normalizationContext={"groups":{"emailoffer:read"}},
*   denormalizationContext={"groups":{"emailoffer:write"}},
 * )
 * @ORM\Entity(repositoryClass=EmailOfferRepository::class)
 */
class EmailOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"emailoffer:read" })
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"emailoffer:read", "emailoffer:write", })
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"emailoffer:read", "emailoffer:write", })
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="email")
     * @Groups({"emailoffer:read" })
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
            $offer->setEmail($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getEmail() === $this) {
                $offer->setEmail(null);
            }
        }

        return $this;
    }
}
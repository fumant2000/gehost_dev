<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\DomainOfferRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 *  @ApiResource(
 *  normalizationContext={"groups":{"domainoffer:read"}},
*   denormalizationContext={"groups":{"domainoffer:write"}},
 * )
 * @ORM\Entity(repositoryClass=DomainOfferRepository::class)
 */
class DomainOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"domainoffer:read",})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"domainoffer:read", "domainoffer:write", })
     */
    private $extension;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="domain")
     * @Groups({"domainoffer:read",})
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

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

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
            $offer->setDomain($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getDomain() === $this) {
                $offer->setDomain(null);
            }
        }

        return $this;
    }
}
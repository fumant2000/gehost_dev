<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use App\Repository\HostingOfferRepository;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *  normalizationContext={"groups":{"hostingoffer:read"}},
*   denormalizationContext={"groups":{"hostingoffer:write"}},
 * )
 * @ORM\Entity(repositoryClass=HostingOfferRepository::class)
 */
class HostingOffer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"hostingoffer:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"hostingoffer:read", "hostingoffer:write", })
     */
    private $type;

    /**
     * @ORM\OneToMany(targetEntity=Offer::class, mappedBy="hosting")
     * @Groups({"hostingoffer:read"})
     */
    private $offers;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"hostingoffer:read", "hostingoffer:write", })
     */
    private $title;

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
            $offer->setHosting($this);
        }

        return $this;
    }

    public function removeOffer(Offer $offer): self
    {
        if ($this->offers->removeElement($offer)) {
            // set the owning side to null (unless already changed)
            if ($offer->getHosting() === $this) {
                $offer->setHosting(null);
            }
        }

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
}
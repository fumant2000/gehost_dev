<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DomainRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=DomainRepository::class)
 * 
* @ApiResource(
*       normalizationContext={"groups":{"domain:read"}},
*       denormalizationContext={"groups":{"domain:write"}},
*)
 */
class Domain
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("domain:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"domain:read", "domain:write"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"domain:read", "domain:write"})
     */
    private $extension;

    /**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 * @Groups("domain:read")
 */
private $createdAt;

/**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="update")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 * @Groups("domain:read")
 */
private $updatedAt;

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

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    public function setExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    public function getCeatedAt(): ?\DateTimeInterface
    {
        return $this->ceatedAt;
    }

    public function setCeatedAt(\DateTimeInterface $ceatedAt): self
    {
        $this->ceatedAt = $ceatedAt;

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

}
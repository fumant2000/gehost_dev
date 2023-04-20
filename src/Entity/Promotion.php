<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PromotionRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=PromotionRepository::class)
 *  @ApiResource(
 *          normalizationContext={"groups":{"promotion:read"}},
*           denormalizationContext={"groups":{"promotion:write"}},
 *)
 * 
* @ApiResource
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     *  @Groups("promotion:read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     *  @Groups({"promotion:read", "promotion:write"})
     * 
     */
    private $title;

    /**
     * @ORM\Column(type="integer")
     *  @Groups({"promotion:read", "promotion:write"})
     */
    private $duration;

        /**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="create")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 *  @Groups("promotion:read")
 */
protected $createdAt;

/**
 * @var \DateTime
 * @Gedmo\Mapping\Annotation\Timestampable(on="update")
 * @Doctrine\ORM\Mapping\Column(type="datetime")
 *  @Groups("promotion:read")
 */
protected $updatedAt;

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

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    public function setDuration(int $duration): self
    {
        $this->duration = $duration;

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
}
<?php

namespace App\Entity;

use App\Repository\ShotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShotRepository::class)
 */
class Shot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $blankshot;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $club_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $club_subtype;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lie_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lie_subtype;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trajectory;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $wind_type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rain_type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="shots")
     * @ORM\JoinColumn(nullable=false)
     */
    private $created_by;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $updated_by;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBlankshot(): ?bool
    {
        return $this->blankshot;
    }

    public function setBlankshot(bool $blankshot): self
    {
        $this->blankshot = $blankshot;

        return $this;
    }

    public function getClubType(): ?string
    {
        return $this->club_type;
    }

    public function setClubType(?string $club_type): self
    {
        $this->club_type = $club_type;

        return $this;
    }

    public function getClubSubtype(): ?string
    {
        return $this->club_subtype;
    }

    public function setClubSubtype(?string $club_subtype): self
    {
        $this->club_subtype = $club_subtype;

        return $this;
    }

    public function getLieType(): ?string
    {
        return $this->lie_type;
    }

    public function setLieType(?string $lie_type): self
    {
        $this->lie_type = $lie_type;

        return $this;
    }

    public function getLieSubtype(): ?string
    {
        return $this->lie_subtype;
    }

    public function setLieSubtype(?string $lie_subtype): self
    {
        $this->lie_subtype = $lie_subtype;

        return $this;
    }

    public function getTrajectory(): ?string
    {
        return $this->trajectory;
    }

    public function setTrajectory(?string $trajectory): self
    {
        $this->trajectory = $trajectory;

        return $this;
    }

    public function getWindType(): ?string
    {
        return $this->wind_type;
    }

    public function setWindType(?string $wind_type): self
    {
        $this->wind_type = $wind_type;

        return $this;
    }

    public function getRainType(): ?string
    {
        return $this->rain_type;
    }

    public function setRainType(?string $rain_type): self
    {
        $this->rain_type = $rain_type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->created_by;
    }

    public function setCreatedBy(?User $created_by): self
    {
        $this->created_by = $created_by;

        return $this;
    }

    public function getUpdatedBy(): ?User
    {
        return $this->updated_by;
    }

    public function setUpdatedBy(?User $updated_by): self
    {
        $this->updated_by = $updated_by;

        return $this;
    }
}

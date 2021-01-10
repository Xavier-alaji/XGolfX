<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CourseRepository::class)
 */
class Course
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sss;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $slope;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="courses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $created_by;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $updated_by;

    /**
     * @ORM\OneToMany(targetEntity=Hole::class, mappedBy="course_id", orphanRemoval=true)
     */
    private $holes;

    public function __construct()
    {
        $this->holes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getSss(): ?float
    {
        return $this->sss;
    }

    public function setSss(?float $sss): self
    {
        $this->sss = $sss;

        return $this;
    }

    public function getSlope(): ?float
    {
        return $this->slope;
    }

    public function setSlope(?float $slope): self
    {
        $this->slope = $slope;

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

    /**
     * @return Collection|Hole[]
     */
    public function getHoles(): Collection
    {
        return $this->holes;
    }

    public function addHole(Hole $hole): self
    {
        if (!$this->holes->contains($hole)) {
            $this->holes[] = $hole;
            $hole->setCourseId($this);
        }

        return $this;
    }

    public function removeHole(Hole $hole): self
    {
        if ($this->holes->removeElement($hole)) {
            // set the owning side to null (unless already changed)
            if ($hole->getCourseId() === $this) {
                $hole->setCourseId(null);
            }
        }

        return $this;
    }
}

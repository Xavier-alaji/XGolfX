<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $player_index;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $licence_number;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity=Course::class, mappedBy="created_by", orphanRemoval=true)
     */
    private $courses;

    /**
     * @ORM\OneToMany(targetEntity=Hole::class, mappedBy="created_by", orphanRemoval=true)
     */
    private $holes;

    /**
     * @ORM\OneToMany(targetEntity=Shot::class, mappedBy="created_by", orphanRemoval=true)
     */
    private $shots;

    public function __construct()
    {
        $this->courses = new ArrayCollection();
        $this->holes = new ArrayCollection();
        $this->shots = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getPlayerIndex(): ?float
    {
        return $this->player_index;
    }

    public function setPlayerIndex(?float $player_index): self
    {
        $this->player_index = $player_index;

        return $this;
    }

    public function getLicenceNumber(): ?string
    {
        return $this->licence_number;
    }

    public function setLicenceNumber(?string $licence_number): self
    {
        $this->licence_number = $licence_number;

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

    /**
     * @return Collection|Course[]
     */
    public function getCourses(): Collection
    {
        return $this->courses;
    }

    public function addCourse(Course $course): self
    {
        if (!$this->courses->contains($course)) {
            $this->courses[] = $course;
            $course->setCreatedBy($this);
        }

        return $this;
    }

    public function removeCourse(Course $course): self
    {
        if ($this->courses->removeElement($course)) {
            // set the owning side to null (unless already changed)
            if ($course->getCreatedBy() === $this) {
                $course->setCreatedBy(null);
            }
        }

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
            $hole->setCreatedBy($this);
        }

        return $this;
    }

    public function removeHole(Hole $hole): self
    {
        if ($this->holes->removeElement($hole)) {
            // set the owning side to null (unless already changed)
            if ($hole->getCreatedBy() === $this) {
                $hole->setCreatedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Shot[]
     */
    public function getShots(): Collection
    {
        return $this->shots;
    }

    public function addShot(Shot $shot): self
    {
        if (!$this->shots->contains($shot)) {
            $this->shots[] = $shot;
            $shot->setCreatedBy($this);
        }

        return $this;
    }

    public function removeShot(Shot $shot): self
    {
        if ($this->shots->removeElement($shot)) {
            // set the owning side to null (unless already changed)
            if ($shot->getCreatedBy() === $this) {
                $shot->setCreatedBy(null);
            }
        }

        return $this;
    }
}

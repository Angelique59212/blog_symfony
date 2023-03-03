<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $pseudo;

    #[ORM\Column(length: 255)]
    private ?string $email;

    #[ORM\Column(length: 255)]
    private ?string $password;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Article::class)]
    private Collection $user;

    #[ORM\ManyToOne(inversedBy: 'user')]
    private ?Comments $userUsing = null;

    #[ORM\OneToMany(mappedBy: 'roleUsing', targetEntity: role::class)]
    private Collection $role;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Article $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->setUser($this);
        }

        return $this;
    }

    public function removeUser(Article $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getUser() === $this) {
                $user->setUser(null);
            }
        }

        return $this;
    }

    public function getUserUsing(): ?Comments
    {
        return $this->userUsing;
    }

    public function setUserUsing(?Comments $userUsing): self
    {
        $this->userUsing = $userUsing;

        return $this;
    }

    /**
     * @return Collection<int, role>
     */
    public function getRole(): Collection
    {
        return $this->role;
    }

    public function addRole(role $role): self
    {
        if (!$this->role->contains($role)) {
            $this->role->add($role);
            $role->setRoleUsing($this);
        }

        return $this;
    }

    public function removeRole(role $role): self
    {
        if ($this->role->removeElement($role)) {
            // set the owning side to null (unless already changed)
            if ($role->getRoleUsing() === $this) {
                $role->setRoleUsing(null);
            }
        }

        return $this;
    }
}

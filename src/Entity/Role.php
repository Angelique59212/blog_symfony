<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 70)]
    private ?string $role;

    #[ORM\ManyToOne(inversedBy: 'role')]
    private ?User $roleUsing = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getRoleUsing(): ?User
    {
        return $this->roleUsing;
    }

    public function setRoleUsing(?User $roleUsing): self
    {
        $this->roleUsing = $roleUsing;

        return $this;
    }
}

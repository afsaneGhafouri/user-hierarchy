<?php
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Role\Role;

class User
{
    private string $name;
    private Role $role;

    public function __construct(string $name, Role $role)
    {
        $this->name = $name;
        $this->role = $role;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getRole(): Role
    {
        return $this->role;
    }

    public function setRole(Role $role): void
    {
        $this->role = $role;
    }
}


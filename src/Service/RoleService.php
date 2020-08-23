<?php
declare(strict_types=1);

namespace App\Service;

use App\Entity\User;

class RoleService
{
    private array $roles;
    private array $users;

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    public function setUsers(array $users): void
    {
        $this->users = $users;
    }

    public function getSubOrdinates(User $givenUser): array
    {
        $givenUserLevel = $givenUser->getRole()->getLevel();

        return array_filter($this->users, function ($user) use ($givenUserLevel) {
            return $user->getRole()->getLevel() > $givenUserLevel;
        });
    }
}

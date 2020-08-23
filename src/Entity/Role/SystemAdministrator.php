<?php
declare(strict_types=1);

namespace App\Entity\Role;

class SystemAdministrator extends Role
{
    private const SYSTEM_ADMINISTRATOR_LEVEL = 0;

    public function getLevel(): int
    {
        return self::SYSTEM_ADMINISTRATOR_LEVEL;
    }
}
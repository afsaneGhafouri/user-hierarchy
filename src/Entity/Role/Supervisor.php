<?php

namespace App\Entity\Role;

class Supervisor extends Role
{
    private const SUPERVISOR_LEVEL = 2;

    public function getLevel(): int
    {
        return self::SUPERVISOR_LEVEL;
    }
}
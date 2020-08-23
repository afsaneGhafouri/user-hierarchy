<?php

namespace App\Entity\Role;

class Employee extends Role
{
    private const EMPLOYEE_LEVEL = 3;

    public function getLevel(): int
    {
        return self::EMPLOYEE_LEVEL;
    }
}
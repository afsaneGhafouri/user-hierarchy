<?php

namespace App\Entity\Role;

class LocationManager extends Role
{
    private const LOCATION_MANAGER_LEVEL = 1;

    public function getLevel(): int
    {
        return self::LOCATION_MANAGER_LEVEL;
    }
}
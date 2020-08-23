<?php

namespace App\Entity\Role;

class Trainer extends Role
{
    private const TRAINER_LEVEL = 3;

    public function getLevel(): int
    {
        return self::TRAINER_LEVEL;
    }
}
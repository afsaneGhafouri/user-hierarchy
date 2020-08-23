<?php
declare(strict_types=1);

namespace App\Entity;

use JsonSerializable;

class Role implements JsonSerializable
{
    public const SYSTEM_ADMINISTRATOR_LEVEL = 0;
    public const LOCATION_MANAGER_LEVEL = 1;
    public const SUPERVISOR_LEVEL = 2;
    public const EMPLOYEE_LEVEL = 3;
    public const TRAINER_LEVEL = 3;

    private string $name;
    private ?Role $parent;
    private int $level;

    public function __construct(string $name, int $level, ?Role $parent = null)
    {
        $this->name = $name;
        $this->level = $level;
        $this->parent = $parent;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getParent(): ?Role
    {
        return $this->parent;
    }

    public function setParent(?Role $parent): void
    {
        $this->parent = $parent;
    }

    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'parent' => $this->parent ? $this->parent->name : null,
            'level' => $this->level
        ];
    }
}
<?php

namespace App\Entity\Role;

use JsonSerializable;

abstract class Role implements JsonSerializable
{
    protected string $name;
    protected ?Role $parent;

    abstract public function getLevel(): int;

    public function __construct(string $name, ?Role $parent = null)
    {
        $this->name = $name;
        $this->parent = $parent;
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
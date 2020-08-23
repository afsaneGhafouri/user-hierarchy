<?php
declare(strict_types=1);

namespace Unit\Entity;

use App\Entity\Role;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    public function testSetRoleName(): void
    {
        $role = new Role('Admin', 0);
        $role->setName('Admin Test');

        $this->assertEquals('Admin Test', $role->getName());
    }

    public function testSetRoleParent(): void
    {
        $role = new Role('Role', 2);
        $parentRole = new Role('Parent', 10);

        $role->setParent($parentRole);

        $this->assertEquals(10, $role->getParent()->getLevel());
        $this->assertEquals(2, $role->getLevel());
    }
}
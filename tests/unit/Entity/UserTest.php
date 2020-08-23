<?php
declare(strict_types=1);

namespace Unit\Entity;

use App\Entity\User;
use App\Entity\Role;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSetUserName(): void
    {
        $roleMock = $this->createMock(Role::class);

        $user = new User('Adam', $roleMock);
        $user->setName('Mary');

        $this->assertEquals('Mary', $user->getName());
    }

    public function testSetUserRole(): void
    {
        $adminRoleMock = $this->createMock(Role::class);
        $managerRoleMock = $this->createMock(Role::class);

        $user = new User('Adam', $adminRoleMock);
        $user->setRole($managerRoleMock);

        $this->assertSame($managerRoleMock, $user->getRole());
    }
}
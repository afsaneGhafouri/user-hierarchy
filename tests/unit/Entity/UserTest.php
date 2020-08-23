<?php
declare(strict_types=1);

namespace Unit\Entity;

use App\Entity\Role\LocationManager;
use App\Entity\User;
use App\Entity\Role\SystemAdministrator;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSetUserName(): void
    {
        $roleMock = $this->createMock(SystemAdministrator::class);

        $user = new User('Adam', $roleMock);
        $user->setName('Mary');

        $this->assertEquals('Mary', $user->getName());
    }

    public function testSetUserRole(): void
    {
        $adminRoleMock = $this->createMock(SystemAdministrator::class);
        $managerRoleMock = $this->createMock(LocationManager::class);

        $user = new User('Adam', $adminRoleMock);
        $user->setRole($managerRoleMock);

        $this->assertSame($managerRoleMock, $user->getRole());
    }
}
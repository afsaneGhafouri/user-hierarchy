<?php
declare(strict_types=1);

namespace Unit\Entity\Role;

use App\Entity\Role\Employee;
use App\Entity\Role\LocationManager;
use App\Entity\Role\Role;
use App\Entity\Role\Supervisor;
use App\Entity\Role\SystemAdministrator;
use App\Entity\Role\Trainer;
use PHPUnit\Framework\TestCase;

class RoleTest extends TestCase
{
    public function testsSetRoleName(): void
    {
        $role = new SystemAdministrator('Admin');

        $role->setName('New name');

        $this->assertEquals('New name', $role->getName());
    }

    public function testsSetRoleParent(): void
    {
        $parentMock = $this->createMock(Role::class);

        $role = new SystemAdministrator('Admin');
        $role->setParent($parentMock);

        $this->assertSame($parentMock, $role->getParent());
    }

    /**
     * @dataProvider roleLevelDataProvider
     */
    public function testsRoleLevel(Role $role, int $level): void
    {
        $this->assertEquals($level, $role->getLevel());
    }

    public function roleLevelDataProvider(): array
    {
        return [
          'system admin level should be 0' => [new SystemAdministrator('foo'), 0],
          'manager level should be 1' => [new LocationManager('foo'), 1],
          'supervisor level should be 2' => [new Supervisor('foo'), 2],
          'employee level should be 3' => [new Employee('foo'), 3],
          'trainer level should be 3' => [new Trainer('foo'), 3]
        ];
    }
}
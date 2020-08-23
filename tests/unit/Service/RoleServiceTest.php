<?php
declare(strict_types=1);

namespace Unit\Service;

use App\Entity\Role;
use App\Entity\User;
use App\Service\RoleService;
use PHPUnit\Framework\TestCase;

class RoleServiceTest extends TestCase
{
    /**
     * @dataProvider subordinatesCountDataProvider
     */
    public function testSubordinatesShouldReturnCorrectUserCount(
        array $roles,
        array $users,
        User $user,
        int $expected
    ): void {
        $service = new RoleService();
        $service->setRoles($roles);
        $service->setUsers($users);

        $response = $service->getSubOrdinates($user);

        $this->assertCount($expected, $response);
    }

    /**
     * @dataProvider subordinatesUsersDataProvider
     */
    public function testSubordinateShouldReturnCorrectUserList(
        array $roles,
        array $users,
        User $user,
        array $expected
    ): void {
        $service = new RoleService();
        $service->setRoles($roles);
        $service->setUsers($users);

        $response = $service->getSubOrdinates($user);

        $this->assertEqualsCanonicalizing($expected, $response);
    }

    public function subordinatesCountDataProvider(): array
    {
        $systemAdminRole = new Role('System Administrator', Role::SYSTEM_ADMINISTRATOR_LEVEL);
        $locationManagerRole = new Role('Location Manager', Role::LOCATION_MANAGER_LEVEL, $systemAdminRole);
        $supervisorRole = new Role('Supervisor', Role::SUPERVISOR_LEVEL, $locationManagerRole);
        $employeeRole = new Role('Employee', Role::EMPLOYEE_LEVEL, $supervisorRole);
        $trainerRole = new Role('Trainer', Role::TRAINER_LEVEL, $employeeRole);
        $roles = [
            $systemAdminRole,
            $locationManagerRole,
            $supervisorRole,
            $employeeRole,
            $trainerRole
        ];

        $adminUser = new User('Adam Admin', $systemAdminRole);
        $managerUser = new User('Mary Manager', $locationManagerRole);
        $supervisorUser = new User('Sam Supervisor', $supervisorRole);
        $employeeUser = new User('Emily Employee', $employeeRole);
        $trainerUser = new User('Steve Trainer', $trainerRole);
        $users = [
            $adminUser,
            $employeeUser,
            $supervisorUser,
            $managerUser,
            $trainerUser
        ];

        return [
            'admin user should have 4 subordinates' => [$roles, $users, $adminUser, 4],
            'manager user should have 3 subordinates' => [$roles, $users, $managerUser, 3],
            'supervisor user should have 2 subordinates' => [$roles, $users, $supervisorUser, 2],
            'employee user should have 0 subordinates' => [$roles, $users, $employeeUser, 0],
            'trainer user should have 0 subordinates' => [$roles, $users, $trainerUser, 0]
        ];
    }

    public function subordinatesUsersDataProvider(): array
    {
        $systemAdminRole = new Role('System Administrator', Role::SYSTEM_ADMINISTRATOR_LEVEL);
        $locationManagerRole = new Role('Location Manager', Role::LOCATION_MANAGER_LEVEL, $systemAdminRole);
        $supervisorRole = new Role('Supervisor', Role::SUPERVISOR_LEVEL, $locationManagerRole);
        $employeeRole = new Role('Employee', Role::EMPLOYEE_LEVEL, $supervisorRole);
        $trainerRole = new Role('Trainer', Role::TRAINER_LEVEL, $employeeRole);
        $roles = [
            $systemAdminRole,
            $locationManagerRole,
            $supervisorRole,
            $employeeRole,
            $trainerRole
        ];

        $adminUser = new User('Adam Admin', $systemAdminRole);
        $managerUser = new User('Mary Manager', $locationManagerRole);
        $supervisorUser = new User('Sam Supervisor', $supervisorRole);
        $employeeUser = new User('Emily Employee', $employeeRole);
        $trainerUser = new User('Steve Trainer', $trainerRole);
        $users = [
            $adminUser,
            $employeeUser,
            $supervisorUser,
            $managerUser,
            $trainerUser
        ];

        return [
            'admin user' => [$roles, $users, $adminUser, [$managerUser, $supervisorUser, $employeeUser, $trainerUser]],
            'manager user' => [$roles, $users, $managerUser, [$supervisorUser, $employeeUser, $trainerUser]],
            'supervisor user' => [$roles, $users, $supervisorUser, [$employeeUser, $trainerUser]],
            'employeeUser user' => [$roles, $users, $employeeUser, []],
            'trainerUser user' => [$roles, $users, $trainerUser, []]
        ];
    }
}
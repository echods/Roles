<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Echods\Roles\Models\Role;

class RolesSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get roles from config or define them here
        $roles = $this->getRoles();

        foreach ($roles as $roleData) {
            Role::updateOrCreate(
                ['handle' => $roleData['handle']],
                $roleData
            );
        }

        $this->command->info('Roles seeded successfully!');
    }

    /**
     * Get the roles to seed.
     * You can customize this method to add your own logic.
     *
     * @return array
     */
    protected function getRoles(): array
    {
        // Option 1: Use config (default behavior)
        if (config('roles.all')) {
            return config('roles.all');
        }

        // Option 2: Define roles directly (customize as needed)
        return [
            [
                'handle' => 'admin',
                'description' => 'Administrator role with full access'
            ],
            [
                'handle' => 'editor',
                'description' => 'Editor role with content management access'
            ],
            [
                'handle' => 'user',
                'description' => 'Basic user role with limited access'
            ],
        ];
    }
}
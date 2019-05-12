<?php

namespace Echods\Roles\Console\Commands;

use Illuminate\Console\Command;
use Echods\Roles\Models\Role;

class GenerateRoles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roles:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate roles for Echods\Roles from config file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $roles = config('roles.all');

        foreach($roles as $role) {
            Role::create($role);
        }

        $this->info('Roles have been generated!');
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CRUDPermissionsCreator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm_permission:create {permission} {--single=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Creates Permissions For CRUDS and singles ';

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
        $permissions = array_unique(array_filter(explode(',', $this->argument('permission'))));

        \Artisan::call("crm_permission:sync");

        $single = $this->option('single');
        if ($single == "false") {
            foreach ($permissions as $pkey => $p) {
                foreach (['Export', 'Add', 'Edit', 'Show', 'Delete'] as $action) {
                    $name = $action . ' ' . ucfirst(trim($p));
                    if (!Permission::where('name', $name)->first()) {
                        $permission = new Permission();
                        $permission->name = $name;
                        $permission->save();
                        Role::where('id', 1)->firstOrFail()->givePermissionTo($permission->refresh());
                        $this->info("\n Permission [$name] Added");
                    } else {
                        $this->warn("\n Permission [$name] Already Exsits");
                    }
                }
            }
        } else {
            foreach ($permissions as $pkey => $p) {
                $name = trim($p);
                if (!Permission::where('name', $name)->first()) {
                    $permission = new Permission();
                    $permission->name = $name;
                    $permission->save();
                    Role::where('id', 1)->firstOrFail()->givePermissionTo($permission->refresh());
                    $this->info("\n Permission [$name] Added");
                } else {
                    // $this->warn("\n Permission [$name] Already Exsits");
                }
            }
        }

        \File::put(base_path('permissions.txt'), \Spatie\Permission\Models\Permission::all()->pluck('name')->implode(','));
    }
}

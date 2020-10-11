<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;
use Symfony\Component\Finder\Finder;
use Spatie\Permission\Models\Permission;

class CRUDPermissionsSync extends Command
{
    private $role;

    private $user;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crm_permission:sync {--refresh=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = ' Syncs Permissions For CRUDS and singles ';

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
        $this->prepareUserAndRole();
        $permissions = $this->getPermissionsFromFiles();
        foreach ($permissions as $pkey => $p) {
            $name = trim($p);
            if (!\Validator::make(['name' => $name], ['name'=>'required|unique:permissions|max:50'])->fails()) {
                $permission = Permission::create([ 'name' => $name ]);
                $this->role->givePermissionTo($permission->refresh());
                $this->info("\n Permission [$name] Added");
            }
        }
    }
    /**
     * Truncate Role and Permission Tables
     *
     * @return void
     */
    public function cleanRoleAndPermissionTables() : void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('role_has_permissions')->truncate();
        DB::table('model_has_roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
    /**
     * Prepare user and role.
     * this function creates a role and user if they dose not exist.
     *
     * @return void
     */
    public function prepareUserAndRole() : void
    {
        if ($this->option("refresh") != "false") {
            $this->cleanRoleAndPermissionTables();
        }

        $this->role = Role::find(config('system.roles.admin.id'));
        if (!$this->role) {
            $this->role = Role::create([
                'id'   => config('system.roles.admin.id'),
                'name' => config('system.roles.admin.name')
            ]);
            $this->info('Role Created Successfully');
        }

        $user = User::find(1);

        if (!$user) {
            $user = User::create([
                'name'              => config('system.company.name'),
                'email'             => config('system.company.email'),
                'password'          => Hash::make(config('system.company.password')),
                'lang'              => 'en',
                'admin_theme'       => null,
                'agent_type'        => 1,
                'image'             => null,
                'remember_token'    => null,
                'type'              => 'admin',
                'agents_can_assign' => null,
                'agent_status_id'   => null,
                'whats_app_text'    => config('system.company.description'),
                'update_dashboard'  => '0',
                'created_at'        => '2019-01-01 00:00:00',
                'updated_at'        => '2019-01-01 00:00:00',
            ]);

            $user->assignRole($this->role);

            $this->info('User Created Successfully And Role assign to him');
        } else {
            if (!$user->hasRole(config('system.roles.admin.id'))) {
                $user->assignRole($this->role);
                $this->info('Role Added Successfully');
            }
        }
    }

    /**
     * Get Permissions From Files.
     *
     * @return array
     */
    public function getPermissionsFromFiles() : array
    {
        $path = base_path();
        $keys = [];
        $functions = [
            'userCan',
        ];
        $pattern =                                  // See http://regexr.com/392hu
            "[^\w|>]" .                             // Must not have an alphanum or _ or > before real method
            "(" . implode('|', $functions) . ")" .  // Must start with one of the functions
            "\(" .                                  // Match opening parenthese
            "[\'\"]" .                              // Match " or '
            "(" .                                   // Start a new group to match:
            //            "[a-zA-Z0-9_-]+".         // Must start with group
            "([^\1)]+)+" .                          // Be followed by one or more items/keys
            ")" .                                   // Close group
            "[\'\"]" .                              // Closing quote
            "[\),]";                                // Close parentheses or new parameter

        // Find all PHP + Twig files in the app folder, except for storage
        $finder = new Finder();
        $finder->in($path)->exclude('storage')->name('*.php')->name('*.twig')->files();

        /** @var \Symfony\Component\Finder\SplFileInfo $file */
        foreach ($finder as $file) {
            // Search the current file for the pattern
            if (preg_match_all("/$pattern/siU", $file->getContents(), $matches)) {
                // Get all matches
                foreach ($matches[2] as $key) {
                    $keys[] = $key;
                }
            }
        }

        // Remove duplicates
        $keys = array_unique($keys);

        $base_permissions = array_filter(explode(',', \File::get(base_path('permissions.txt'))));

        return array_map('trim', array_merge($keys, $base_permissions));
    }
}

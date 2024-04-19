<?php

namespace App\Console\Commands;

use App\Models\Admin;
use App\Models\Permission;
use App\Models\Role;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EstablishRolesAndPermissionsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'establish:roles-permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will establish both the system\'s roles and permissions.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $roles = config('roles');
        $permissions = config('permissions');

        DB::beginTransaction();
        try {
            DB::table('roles')->delete();
            DB::table('permissions')->delete();
            DB::table('roles_permissions')->delete();

            // Establish Roles
            foreach ($roles as $role => $guard) {
                Role::create([
                    'name' => __($role),
                    'guard' => $guard,
                ]);
            }

            // Establish Permissions
            foreach ($permissions as $permission => $guard) {
                Permission::create([
                    'name' => __($permission),
                    'guard' => $guard,
                ]);
            }

            // Establish Assign
            $db_roles = Role::all();
            $db_permissions = Permission::all();
            foreach ($db_roles as $db_role) {
                foreach ($db_permissions as $db_permission) {
                    if ($db_role->guard == $db_permission->guard) {
                        DB::table('roles_permissions')->insert([
                            'role_id' => $db_role->id,
                            'permission_id' => $db_permission->id,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ]);
                    }
                }
            }

            // Drop
            DB::table('admins')->delete();
            DB::table('users')->delete();

            // Establish
            $admin_id = DB::table('admins')->insertGetId([
                'fname' => 'Reuse',
                'lname' => 'Tools',
                'email' => 'admin@reusetools.org',
                'phone' => '00972567077653',
                'gender' => 'm',
                'password' => Hash::make('password'),
                'role_id' => Role::where('name', 'Super Manager')->first()->id,
                'status' => 'active',
                // 'image' => $filePath,
            ]);

            // Establish
            $user_id = DB::table('users')->insertGetId([
                'fname' => 'Reuse',
                'lname' => 'Tools',
                'email' => 'user@reusetools.org',
                'phone' => '00972567077653',
                'gender' => 'm',
                'password' => Hash::make('password'),
                'role_id' => Role::where('name', 'User')->first()->id,
                'status' => 'active',
                // 'image' => $filePath,
            ]);

            // Assign
            buildUserSettings($admin_id, 'admin');
            buildUserSettings($user_id);

            DB::commit();
        } catch (Exception $e) {

            DB::rollBack();
            info($e);
            info('Command Failed!');
        }


        return Command::SUCCESS;
    }
}

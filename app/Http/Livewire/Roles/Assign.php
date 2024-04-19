<?php

namespace App\Http\Livewire\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Assign extends Component
{
    public $role;
    protected $permissions;

    public function render()
    {
        $this->permissions = Permission::where('guard', $this->role->guard)->get();

        foreach ($this->permissions as $permission) {
            $permission->setAttribute('checked', false);

            if (Role::whereHas('permissions', function ($query) use ($permission) {
                $query->where('permissions.id', $permission->id);
            })->exists()) {
                $permission->setAttribute('checked', true);
            }
        }

        return view('livewire.roles.assign', [
            'permissions' => $this->permissions,
        ]);
    }

    // Assign Permission
    public function assignPermission($enc_id)
    {
        $permission = Permission::where('id', Crypt::decrypt($enc_id))->first();

        if (Role::whereHas('permissions', function ($query) use ($permission) {
            $query->where('permissions.id', $permission->id);
        })->exists()) {

            DB::table('roles_permissions')->where([
                ['role_id', '=', $this->role->id],
                ['permission_id', '=', $permission->id],
            ])->delete();
        } else {
            DB::table('roles_permissions')->insert([
                'role_id' => $this->role->id,
                'permission_id' => $permission->id
            ]);
        }
    }
}

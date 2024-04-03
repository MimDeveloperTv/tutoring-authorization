<?php 

namespace App\Services;
use App\Http\Resources\PermissionResource;
use App\Http\Resources\RoleCollection;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
class UserRoleService extends Service
{
    public function roles($uuid)
    {
        $user = User::firstOrCreate(['uuid' => $uuid]);
        $this->setData(RoleCollection::collection($user->roles));

        return $this->response();
    }
    public function sync($uuid,$role_ids)
    {
        
         $user = User::firstOrCreate(['uuid' => $uuid]);
         $user->roles()->syncWithPivotValues($role_ids,['assigned_by' => auth()->user()->id]);
         $this->setStatus(202);
         return $this->response();
    }
}
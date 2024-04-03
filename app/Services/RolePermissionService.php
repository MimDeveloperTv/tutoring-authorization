<?php 

namespace App\Services;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Role;
class RolePermissionService extends Service
{
    public function sync($role_id,$permission_ids)
    {
        
         $role = Role::find($role_id);
         $role->permissions()->syncWithPivotValues($permission_ids,['assigned_by' => auth()->user()->id]);
         $this->setStatus(202);
         return $this->response();
    }
}
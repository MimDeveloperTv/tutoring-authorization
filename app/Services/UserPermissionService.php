<?php 

namespace App\Services;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
class RolePermissionService extends Service
{
    public function permissions($uuid)
    {
        $user = User::firstOrCreate(['uuid' => $uuid]);
        $this->setData(PermissionResource::collection($user->permissions));

        return $this->response();
    }
    public function sync($uuid,$permission_ids)
    {
        
         $user = User::firstOrCreate(['uuid' => $uuid]);
         $user->permissions()->syncWithPivotValues($permission_ids,['assigned_by' => auth()->user()->id]);
         $this->setStatus(202);
         return $this->response();
    }
}
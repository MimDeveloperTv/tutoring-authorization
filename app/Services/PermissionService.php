<?php 

namespace App\Services;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
class PermissionService extends Service
{
    public function permissions($paginate = 10)
    {
         $permissions = Permission::paginate($paginate);
         
         $this->setData(PermissionResource::collection($permissions));

         return $this->response();
    }

    public function storeNewPermission(array $permission)
    {
         $permission = Permission::create([
             'name' => $permission['name'],
             'label' => $permission['label'],
             'created_by' => auth()->user()->id
         ]);

         $this->setData(new PermissionResource($permission));
         $this->setStatus(201);

         return $this->response();
    }

    public function updatePermission(array $permission,$id)
    {
         Permission::find($id)->update($permission);

         $this->setStatus(202);

         return $this->response();
    }

    public function destroyPermission($id)
    {
        Permission::find($id)->delete();

        $this->setStatus(202);

        return $this->response();
    }
}
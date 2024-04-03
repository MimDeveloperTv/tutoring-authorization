<?php 

namespace App\Services;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;
use App\Models\Role;
class RoleService extends Service
{
    public function roles($paginate,$owner_id)
    {
         $roles = Role::owned($owner_id)->paginate($paginate);
         $this->setData(RoleCollection::collection($roles));

         return $this->response();
    }

    public function storeNewRole(array $role)
    {
         $role = Role::create([
             'name' => $role['name'],
             'owner_id' => $role['owner_id'],
             'created_by' => auth()->user()->id
         ]);

         $this->setData(new RoleResource($role));
         $this->setStatus(201);
         return $this->response();
    }

    public function showRole($id)
    {
        $role = Role::find($id);
        $this->setData(new RoleResource($role));

        return $this->response();
    }

    public function updateRole(array $role,$id)
    {
         Role::find($id)->update($role);

         $this->setStatus(202);

         return $this->response();
    }

    public function destroyRole($id)
    {
        Role::find($id)->delete();

        $this->setStatus(202);

        return $this->response();
    }
}
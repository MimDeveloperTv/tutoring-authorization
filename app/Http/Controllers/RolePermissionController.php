<?php

namespace App\Http\Controllers;

use App\Services\RolePermissionService;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    private $rolePermissionService;
    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }
    public function update(Request $request,$role_id)
    {
        try {
            return $this->rolePermissionService->sync($role_id,$request->permission_ids);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}

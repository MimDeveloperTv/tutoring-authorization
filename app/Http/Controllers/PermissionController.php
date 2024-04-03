<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Throwable;

class PermissionController extends Controller
{
    private $permissionService;
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function index(Request $request)
    {
        try {
            return $this->permissionService->permissions($request->paginate ?? 10);
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function store(Request $request)
    {
        try {
            return $this->permissionService->storeNewPermission($request->only(['name','label']));
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request,$id)
    {
        try {
            return $this->permissionService->updatePermission(
                $request->only('name','label')
                ,$id
            );
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function destroy($id)
    {
        try {
            return $this->permissionService->destroyPermission($id);
        } catch (Throwable $th) {
            return $th;
        }
    }
}

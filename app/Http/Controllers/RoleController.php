<?php

namespace App\Http\Controllers;

use App\Services\RoleService;
use Illuminate\Http\Request;
use Throwable;

class RoleController extends Controller
{
    private $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index(Request $request)
    {
        try {
            return $this->roleService->roles($request->paginate ?? 10,$request->owner_id);
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function store(Request $request)
    {
        try {
            return $this->roleService->storeNewRole($request->only(['name','owner_id']));
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function show($id)
    {
        try {
            return $this->roleService->showRole($id);
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function update(Request $request,$id)
    {
        try {
            return $this->roleService->updateRole(
                $request->only(['name','owner_id']),
                $id
            );
        } catch (Throwable $th) {
            return $th;
        }
    }

    public function destroy($id)
    {
        try {
            return $this->roleService->destroyRole($id);
        } catch (Throwable $th) {
            return $th;
        }
    }
}

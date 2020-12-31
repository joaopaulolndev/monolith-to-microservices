<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        \Gate::authorize('view', 'roles');

        return RoleResource::collection(Role::all()->load('permissions'));
    }

    public function store(Request $request)
    {
        \Gate::authorize('edit', 'roles');

        $role = Role::create($request->only('name'));

        $role->permissions()->attach($request->input('permissions'));

        return response(new RoleResource($role->load('permissions')), Response::HTTP_CREATED);
    }

    public function show($id)
    {
        \Gate::authorize('view', 'roles');

        return new RoleResource(Role::with('permissions')->find($id));
    }

    public function update(Request $request, $id)
    {
        \Gate::authorize('edit', 'roles');

        $role = Role::find($id);

        $role->update($request->only('name'));

        $role->permissions()->sync($request->input('permissions'));

        return response(new RoleResource($role->load('permissions')), Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        \Gate::authorize('edit', 'roles');

        \DB::table('role_permissions')->where('role_id', $id)->delete();

        Role::destroy($id);

        return \response(null, Response::HTTP_NO_CONTENT);
    }
}

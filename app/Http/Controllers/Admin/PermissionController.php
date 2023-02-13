<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Permission\Store;
use App\Http\Requests\Permission\Update;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['route'] = 'permissions';
        $arr['roles'] = Role::all();
        return view('admin.permissions.index', $arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['route'] = 'permissions';
        $arr['permissions'] = Permission::all();
        return view('admin.permissions.create', $arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web',
        ]);
        $role->syncPermissions($request->permissions);

        Session::flash('message',trans('sidebar.saved'));
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == 1)
            return redirect()->back();

        $arr['route'] = 'permissions';
        $arr['role'] = Role::findById($id);
        $arr['role_permissions'] = $arr['role']->permissions->pluck('id')->toArray();
        $arr['permissions'] = Permission::all();
        $arr['check_all'] = '';

        if (Permission::all()->count() == $arr['role']->permissions->count())
            $arr['check_all'] = 'checked';

        return view('admin.permissions.edit', $arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, $id)
    {
        if ($id == 1)
            return redirect()->back();

        Role::query()->where('id', $id)->update([
            'name' => $request->name,
        ]);
        $role = Role::findById($id);
        $role->syncPermissions($request->permissions);

        Session::flash('message',trans('sidebar.saved'));
        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

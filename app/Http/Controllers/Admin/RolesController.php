<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveRolesRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view',new ModelsRole);

        return view('admin.roles.index',
        ['roles'=> ModelsRole::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',$role=new ModelsRole);

        return view('admin.roles.create',[
            'role'=>$role,
            'permissions'=>Permission::pluck('name','id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create',new ModelsRole);


        $role=ModelsRole::create($request->validated());
        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.role.index')->withFlash('El Rol fue creado correctamente');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(ModelsRole $role)
    {
        $this->authorize('update',$role);


        return view('admin.roles.edit',[
            'role'=>$role,
            'permissions'=>Permission::pluck('name','id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, ModelsRole $role)
    {
        $this->authorize('update',$role);


        $role->update($request->validated());

        $role->permissions()->detach();

        if($request->has('permissions')){
            $role->givePermissionTo($request->permissions);
        }

        return redirect()->route('admin.role.edit',[$role])->withFlash('El Rol actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsRole $role)
    {

        $this->authorize('delete',$role);

        $role->delete();

        return redirect()->route('admin.role.index')->withFlash('Rol <<'.$role->name.'>> eliminado correctamente');

    }
}

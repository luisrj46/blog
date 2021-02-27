<?php

namespace App\Http\Controllers\Admin;

use App\Events\UserWasCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::allowed()->get();


        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=new User;
        $this->authorize('create',$user);

        $roles=Role::with('permissions')->get();
        $permissions=ModelsPermission::all()->pluck('name','id');
        // return ($roles);
        return view('admin.user.create',compact('user','roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',new User());

        $data=$request->validate([
            'email' => 'required|string|email',
            'name' => 'required|string',
        ]);

        $data['password']=Str::random(8);

        $user=User::create($data);

        if($request->filled('roles')){
            $user->assignRole($request->roles);
        }

        if($request->filled('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        UserWasCreated::dispatch($user,$data['password']);
        return redirect()->route('admin.user.index')->withFlash('El usuario ha sido creado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $this->authorize('view',$user);

        return view('admin.user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);

       $roles=Role::with('permissions')->get();
        $permissions=ModelsPermission::all()->pluck('name','id');
        // return ($roles);
        return view('admin.user.edit',compact('user','roles','permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $this->authorize('update',$user);

        $data=$request->validated();

        $user->update($data);

        return redirect()->route('admin.user.edit',$user)->withFlash('Usuario Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete',$user);

        $user->delete();

        return redirect()->route('admin.user.index')->withFlash('Usuario Eliminado');

    }
}

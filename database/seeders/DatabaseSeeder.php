<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Photo;
use App\Models\Pos;
use App\Models\PosTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Schema::disableForeignKeyConstraints();
        // \App\Models\User::factory(10)->create();
        Category::truncate();
        Tag::truncate();
        Photo::truncate();
        Pos::truncate();
        PosTag::truncate();
        Role::truncate();
        Permission::truncate();


        Storage::disk('public')->deleteDirectory('posts');
        Category::factory(5)->create();

        $viewPostPermission=Permission::create(['name'=>'View posts','display_name'=>'Ver Permisos']);
        $UpdatePostPermission=Permission::create(['name'=>'Update posts','display_name'=>'Actualizar Permisos']);
        $CreatePostPermission=Permission::create(['name'=>'Create posts','display_name'=>'Crear Permisos']);
        $DeletePostPermission=Permission::create(['name'=>'Delete posts','display_name'=>'Eliminar Permisos']);

        $viewUserPermission=Permission::create(['name'=>'View users','display_name'=>'Ver Usuarios']);
        $UpdateUserPermission=Permission::create(['name'=>'Update users','display_name'=>'Actualizar Usuarios']);
        $CreateUserPermission=Permission::create(['name'=>'Create users','display_name'=>'Crear Usuarios']);
        $DeleteUserPermission=Permission::create(['name'=>'Delete users','display_name'=>'Eliminar Usuarios']);

        $viewRolePermission=Permission::create(['name'=>'View roles','display_name'=>'Ver roles mas']);
        $UpdateRolePermission=Permission::create(['name'=>'Update roles','display_name'=>'Actualizar roles mas']);
        $CreateRolePermission=Permission::create(['name'=>'Create roles','display_name'=>'Crear roles mas']);
        $DeleteRolePermission=Permission::create(['name'=>'Delete roles','display_name'=>'Eliminar roles mas']);
       $viewPermissionsPermission=Permission::create(['name'=>'View Permissions','display_name'=>'Ver Permissions mas']);
        $UpdatePermissionsPermission=Permission::create(['name'=>'Update Permissions','display_name'=>'Actualizar Permissions mas']);

      //sssssss
        $AdminRole = Role::create(['name' => 'Admin','display_name' => 'Admin']);

        $AdminUser=new User();
        $AdminUser->name="juan de Dios";
        $AdminUser->email="juan9@gmail.com";
        $AdminUser->password='12345678';
        $AdminUser->save();

        $AdminUser->assignRole($AdminRole);


        $WriterRole = Role::create(['name' => 'writer','display_name' => 'writer']);

        $WriterUser=new User();
        $WriterUser->name="luis fernando";
        $WriterUser->email="luis9@gmail.com";
        $WriterUser->password='12345678';
        $WriterUser->save();

        $WriterUser->assignRole($WriterRole);

        $WriterUser->givePermissionTo([$viewPostPermission,$UpdatePostPermission,$CreatePostPermission,$DeletePostPermission]);
        // Pos::truncate();
        Pos::factory(15)->create();

        // Tag::truncate();
        Tag::factory(5)->create();

        // PosTag::truncate();
        PosTag::factory(25)->create();

        Schema::enableForeignKeyConstraints();



    }
}

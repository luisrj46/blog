<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Pos;
use App\Models\PosTag;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Category::truncate();
        Category::factory(5)->create();
//
        // Pos::truncate();
        Pos::factory(15)->create();

        // Tag::truncate();
        Tag::factory(5)->create();

        // PosTag::truncate();
        PosTag::factory(25)->create();

        $user=new User();
        $user->name="juan de Dios";
        $user->email="juan9@gmail.com";
        $user->password=bcrypt('12345678');
        $user->save();
    }
}

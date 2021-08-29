<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $posts=$category->posts()->published()->paginate(2);

        // return $category->load('post');
        if(request()->wantsJson()){
            return $posts;
        }

        return view('pages.index',
        [
            'title'=>"Publicaciones de la Categoria '{$category->name}'",
            'posts'=>$posts
        ]);
    }
}

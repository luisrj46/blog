<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        // return $category->load('post');
        return view('welcome',
        [
            'title'=>"Publicaciones de la Categoria '{$category->name}'",
            'posts'=>$category->posts()->paginate(10)]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        return view('welcome',
        [
            'title'=>"Publicaciones de la etiqueta '{$tag->name}'",
            'posts'=>$tag->posts()->paginate(10)]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag)
    {
        $posts=$tag->posts()->published()->paginate(2);

        if(request()->wantsJson()){
            return $posts;
        }
        return view('pages.index',
        [
            'title'=>"Publicaciones de la etiqueta '{$tag->name}'",
            'posts'=>$posts
            ]);
    }
}

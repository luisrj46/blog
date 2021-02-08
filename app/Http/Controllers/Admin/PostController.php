<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreResquest;
use App\Models\Category;
use App\Models\Pos;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts=Pos::latest('published_at')->get();
        return view('admin.post.index',compact('posts'));
    }
    public function create()
    {
        $etiquetas=Tag::all();
        $categorias=Category::all();
        return view('admin.post.create',compact('categorias','etiquetas'));
    }

    function store(Request $request)
    {
        $this->validate($request,['title'=>'required']);

        $post=Pos::create([
                        'url' => Str::slug($request->get('title')),
                        'title' => $request->get('title'),
                        ]);
            // dd($post);
        return redirect()->route('admin.post.edit',[$post]);
    }

    public function edit(Pos $post)
    {
        $etiquetas=Tag::all();
        $categorias=Category::all();
        return view('admin.post.edit',compact('post','etiquetas','categorias'));
    }



    public function update(Pos $post,PostStoreResquest $request)
    {
        // return $request->all();
        $post->title=$request->get('title');
        $post->url=Str::slug($request->get('title'));
        $post->body=$request->get('body');
        $post->excerpt=$request->get('excerpt');
        $post->published_at=Carbon::parse($request->get('published_at'));
        $post->category_id=$request->get('category_id');
        $post->save();

        $post->tags()->sync($request->get('tags'));

        return redirect()->route('admin.post.edit',[$post])->with('flash', 'Tu publicacion ha sido Guardads');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostStoreResquest;
use App\Models\Category;
use App\Models\Pos;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {

        $posts=Pos::allowed()->get();

        // $posts=Pos::latest('published_at')->get();
        // $posts= Auth::user()->post;
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
        $this->authorize('create', new Pos);

        $this->validate($request,['title'=>'required']);

        // $post=Pos::create($request->only('title'));
        $post=Pos::create($request->all());
            // dd($post);
        return redirect()->route('admin.post.edit',[$post]);
    }

    public function edit(Pos $post)
    {
        $this->authorize('update', $post);


        return view('admin.post.edit',[
            'post'=>$post,
            'etiquetas'=>Tag::all(),
            'categorias'=>Category::all()
        ]);
    }



    public function update(Pos $post,PostStoreResquest $request)
    {
        // // return $request->all();
        // $post->title=$request->get('title');
        // $post->body=$request->get('body');
        // $post->iframe=$request->get('iframe');
        // $post->excerpt=$request->get('excerpt');
        // $post->published_at=$request->get('published_at');
        // $post->category_id=$request->get('category_id');
        // $post->save();

        $this->authorize('update', $post);

        $post->update($request->all());
        $post->generateUrl();
        $post->syncTags($request->get('tags'));

        return redirect()->route('admin.post.edit',[$post])->with('flash', 'La publicacion ha sido Guardads');
    }

    public function destroy(Pos $post)
    {
        $this->authorize('delete', $post);

        $post->delete();
        return redirect()->route('admin.post.index')->with('flash', 'la publicacion ha sido Eliminada');

    }
}

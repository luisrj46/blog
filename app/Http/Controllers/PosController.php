<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Pos;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{
    public function spa()
    {
        return view('pages.spa');
    }

    public function index()
    {


        $query=Pos::published();
        if(request('month')){
            $query->whereMonth('published_at',request('month'));
        }
        if(request('year')){
            $query->whereYear('published_at',request('year'));
        }


        $posts=$query->paginate(5);

        if(request()->wantsJson()){
            return $posts;
        }

        return view('pages.index',compact('posts'));
    }

    public function show(Pos $post)
    {
        // return new PostResource($post);//esta opcion es la mas apropiada para las APIS ya que se puede personalizar los datos

        if(!$post->isPublished() || auth()->check())
        {
            if(request()->wantsJson()){
                $post->load('owner','category','tags','photos');
                return $post;
            }
            return view('post.view',compact('post'));
        }

        abort(404,'error al publicar');

    }

    public function about()
    {
        return view('pages.about');
    }
    public function archive()
        {
            // $date=Pos::selectRaw('year(published_at) year' )
            //         ->selectRaw('month(published_at) month')
            //         ->selectRaw('monthname(published_at) monthname')
            //         ->selectRaw('count(*) posts')
            //         ->groupBy('year','month','monthname')
            //         ->get();
            $date=[
                'authors'=>User::take(4)->get(),
                'categories'=>Category::take(7)->get(),
                'posts'=>Pos::latest()->take(7)->get(),
                'dates'=>Pos::published()->byYearAndMonth()->get(),
            ];

            if(request()->wantsJson()){
                return $date;
            }
            return view('pages.archive',$date);
        }
    public function contact()
        {
            return view('pages.contact');
        }


}

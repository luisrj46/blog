<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pos;
use App\Models\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class PosController extends Controller
{

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

        return view('pages.index',compact('posts'));
    }

    public function show(Pos $post)
    {
        if($post->isPublished() || auth()->check())
        {
            return view('post.view',compact('post'));
        }

        abort(404);

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
            $date=Pos::published()->byYearAndMonth()->get();
            return view('pages.archive',
            [
                'authors'=>User::take(4)->get(),
                'categories'=>Category::take(7)->get(),
                'posts'=>Pos::latest()->take(7)->get(),
                'dates'=>$date
            ]);
        }
    public function contact()
        {
            return view('pages.contact');
        }


}

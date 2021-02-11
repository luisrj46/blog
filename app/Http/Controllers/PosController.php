<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class PosController extends Controller
{

    public function index()
    {

        $posts=Pos::published()->paginate(5);

        return view('pages.index',compact('posts'));
    }

    public function show(Pos $post)
    {
        return view('post.view',compact('post'));
    }

    public function about()
    {
        return view('pages.about');
    }
    public function archive()
        {
            return view('pages.archive');
        }
    public function contact()
        {
            return view('pages.contact');
        }


}

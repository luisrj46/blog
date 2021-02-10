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

        return view('welcome',compact('posts'));
    }

    public function show(Pos $post)
    {
        return view('post.view',compact('post'));
    }


}

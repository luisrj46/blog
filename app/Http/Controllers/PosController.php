<?php

namespace App\Http\Controllers;

use App\Models\Pos;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosController extends Controller
{

    public function index()
    {

        $posts=Pos::published()->get();

        return view('welcome',compact('posts'));
    }

    public function show(Pos $post)
    {
        return view('post.view',compact('post'));
    }


}

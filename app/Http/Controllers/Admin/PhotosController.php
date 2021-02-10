<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Pos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    //
    public function store(Pos $post)
    {
       $this->validate(request(),
       [
        'photo'=>'required|image|max:2000'
       ]);
       $post->photos()->create([
            'url' => request()->file('photo')->store('posts', 'public'),
       ]);
    }

    public function destroy(Photo $photo)
    {
        $photo->delete();


        return back()->with('flash', 'Foto Eliminada');
    }
}

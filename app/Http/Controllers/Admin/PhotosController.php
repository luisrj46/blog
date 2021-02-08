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
       $photourl=request()->file('photo')->store('public');

       Photo::create([
            'url'=>Storage::url($photourl),
            'pos_id'=>$post->id,
       ]);

    }

    public function destroy(Photo $photo)
    {
        $photo->delete();

        $photoPatch=str_replace('storage','public',$photo->url);

        Storage::delete($photoPatch);

        return back()->with('flash', 'Foto Eliminada');
    }
}

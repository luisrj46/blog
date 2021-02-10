<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'url';
    }
    public function posts()
    {
        return $this->hasMany(Pos::class);
    }

    // public function getNameAttribute($value) #Accesor
    // {
    //     return Str::slug($value);
    //     // $this->attributes['name']=$value;
    //     // $this->attributes['url']=Str::slug($value);
    // }
    public function setNameAttribute($value) #mutador
    {
        $this->attributes['name']=$value;
        $this->attributes['url']=Str::slug($value);
    }

}

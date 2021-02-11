<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Pos extends Model
{
    use HasFactory;
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post)
        {
            $post->tags()->detach();
            $post->photos->each->delete();

        });
    }
    protected $table = 'pos';


    protected $fillable = [
        'title',
        'body',
        'url',
        'iframe',
        'category_id',
        'excerpt',
        'published_at'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    protected $dates=['published_at'];

    public static function create(array $attributes=[])
    {
        $post=static::query()->create($attributes);

        $post->generateUrl();

        return $post;
    }


    public function generateUrl()
    {
        $url=Str::slug($this->title);

        if ($this->where('url',$url)->exists()) {
            $url="{$url}-{$this->id}";
        }

        $this->url=$url;

        $this->save();
    }
    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function scopePublished($query)
    {
        $query->whereNotNull('published_at')
        ->where('published_at','<=',Carbon::now())
        ->latest('published_at');
    }

    // public function setTitleAttribute($value) #mutador
    // {
    //     $this->attributes['title']=$value;
    //     $this->attributes['url']=Str::slug($value);
    // }

    public function setPublishedAtAttribute($published_at)
    {
        $this->attributes['published_at']=$published_at ? Carbon::parse($published_at) : null;
    }

    public function setCategoryIdAttribute($category_id)
    {
        $this->attributes['category_id']=Category::find($category_id) ? $category_id
                                            : Category::create(['name' => $category_id])->id;
    }
    public function syncTags($tags)
    {
        $tagIds= collect($tags)->map(function($tag){
            return Tag::find($tag)? $tag : Tag::create(['name'=>$tag])->id;
        });
        return $this->tags()->sync($tagIds);
    }
}

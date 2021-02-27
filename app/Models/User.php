<?php

namespace App\Models;

use Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded=['id'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeAllowed($query)
    {
        if(Auth::user()->can('view',$this)){
            return $query;
        }
        else
        {
            return $query->where('id',Auth::id());
        }
    }
    public function post()
    {
        return $this->hasMany(Pos::class);
    }

    //mutador para el password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password']=Hash::make($password);
    }
    public function getRoleDisplayName()
    {
        return $this->roles->pluck('display_name')->implode(', ');
    }
}

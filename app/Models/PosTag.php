<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosTag extends Model
{
    use HasFactory;

    protected $table = 'pos_tag';

    public $timestamps = false;

}

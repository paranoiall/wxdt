<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FillBlank extends Model
{
    use SoftDeletes;
    protected $guarded = [];
}

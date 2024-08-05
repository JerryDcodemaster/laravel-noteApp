<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUsers extends Model
{
    use HasFactory;

    protected $table = "appusers";

    protected $fillable = [
        'headtext',
        'description',
        'tag'
    ];
}

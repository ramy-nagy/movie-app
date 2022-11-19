<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasTags;

class Movie extends Model
{
    use HasFactory;
    use HasTags;

    protected $fillable  = ['body'];
    protected $casts = [
        'body' => 'collection',
    ];
}

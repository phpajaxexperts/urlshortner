<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlShortner extends Model
{
    use HasFactory;
    protected $table = 'url_shortener';

    protected $fillable = [
        'code', 'url','count'
    ];
}

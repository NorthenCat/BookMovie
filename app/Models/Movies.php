<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $table = 'movies_data';
    protected $fillable = [
        'id',
        'title',
        'description',
        'release_date',
        'poster_url',
        'age_rating',
        'ticket_price',
    ];

}
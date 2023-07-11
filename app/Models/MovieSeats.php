<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieSeats extends Model
{
    use HasFactory;

    protected $table = 'seats_movie';
    protected $fillable = [
        'movie_id',
        'seat_id',
        'is_booked',
        'booked_by',
        'booked_at',
    ];

}
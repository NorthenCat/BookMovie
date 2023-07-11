<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'movie_id',
        'user_id',
        'buyer_name',
        'buyer_email',
        'buyer_age',
        'buyer_phone',
        'total_price',
        'total_seat',
        'seats',
        'status',
    ];
}
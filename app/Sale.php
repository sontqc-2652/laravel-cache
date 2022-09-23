<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;

class Sale
{
    protected $table = 'sales';

    protected $fillable = [
        'user_id', 'product_name', 'product_price',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'carts';
    
    protected $fillable = [
        'user_id',
        'product_type',
        'product_number',
        'price',
        'size',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'has_checkout',
        'user_id',
    ];

    public function cartItem()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

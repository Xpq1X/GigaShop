<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'street',
        'city',
        'postal_code',
        'payment_method',
        'products',
        'total_price',
        'status',
        'paid',
    ];

    protected $casts = [
        'products' => 'array',
        'paid' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

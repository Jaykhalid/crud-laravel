<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'product_id',
        'quantity',
    ];

    protected $primaryKey = 'transaction_id';
    
    public $incrementing = false;

    public function getSubtotalAttribute()
    {
        return $this->product->price * $this->quantity;
    }

    public function setTotalAttribute($total)
    {
       return $this->attributes['total'] = $total;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

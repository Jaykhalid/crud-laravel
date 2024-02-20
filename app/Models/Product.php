<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
    ];
    
    protected $primaryKey = 'product_id';
    
    public $incrementing = false;

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}

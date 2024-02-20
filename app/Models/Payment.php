<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'type_id',
        'date',
        'total',
        'fee',
    ];

    protected $primaryKey = 'payment_id';
    
    public $incrementing = false;


    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
}

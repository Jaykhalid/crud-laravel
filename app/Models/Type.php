<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'name',
    ];
    
    protected $primaryKey = 'type_id';
    
    public $incrementing = false;

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

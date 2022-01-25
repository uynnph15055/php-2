<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class judge extends Model
{
    use HasFactory;
    protected $table = 'judges';
    protected $fillable = ['product_id', 'customer_id', 'number_star', 'content', 'status'];

    public function customer()
    {
        return  $this->belongsTo(customer::class, 'customer_id');
    }
}

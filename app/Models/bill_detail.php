<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';

    public function bill()
    {
        return $this->belongsTo(bill::class, 'bill_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

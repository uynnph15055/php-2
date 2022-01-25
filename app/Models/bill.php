<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = ['customer_id', 'name', 'address', 'phone', 'date_receipt', 'address_detail', 'type_pay', 'note'];
}

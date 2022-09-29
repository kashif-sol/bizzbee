<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreDetails extends Model
{
    use HasFactory;
     protected $table = 'shops_otherdetails';
     protected $fillable = [
        'identity',
        'authentication',
        'sonce',
        'shop_id',
    ];
}

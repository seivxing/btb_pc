<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;
class ProductCart extends Model
{
    use HasFactory;
    protected $table = 'cartproducts';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class , 'product_id','id');
    }

}

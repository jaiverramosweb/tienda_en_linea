<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'stock', 'image', 'price', 'status', 'category_id', 'provider_id'];

    public function add_stock($quantity)
    {
        /* $this->update([
            'stock' => DB::raw("stock + $quantity")
        ]); */

        $this->increment('stock', $quantity);
    }

    public function subtract_stock($quantity)
    {
        /* $this->update([
            'stock' => DB::raw("stock - $quantity")
        ]); */

        $this->decrement('stock', $quantity);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}

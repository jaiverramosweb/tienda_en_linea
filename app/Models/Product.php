<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'slug', 'shopt_description', 'long_description', 'stock', 'price', 'status', 'subcategory_id', 'provider_id'];

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

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function images()
    {
        return $this->morphToMany(Image::class, 'imageable');
    }

    public function my_store($request)
    {
        $product = self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '_'), 
            'shopt_description' => $request->shopt_description,
            'long_description' => $request->long_description,
            'stock' => $request->stock,
            'price' => $request->price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);

        $this->generarCodigo($product);
    }

    public function my_update($request)
    {
        $product = $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '_'), 
            'shopt_description' => $request->shopt_description,
            'long_description' => $request->long_description,
            'stock' => $request->stock,
            'price' => $request->price,
            'status' => $request->status,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);

        $this->generarCodigo($product);
    }
    
    public function generarCodigo($product)
    {
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCeros]);
    }
}

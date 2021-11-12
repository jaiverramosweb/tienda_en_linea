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
        return $this->morphMany(Image::class, 'imageable');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function my_store($request)
    {
        $product = self::create([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->name, '_'), 
            'shopt_description' => $request->shopt_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);

        $product->tags()->attach($request->get('tags'));

        $this->generarCodigo($product);

        $this->upload_files($request, $product);
    }

    public function my_update($request)
    {
        $this->update([
            'code' => $request->code,
            'name' => $request->name,
            'slug' => Str::slug($request->slug, '_'), 
            'shopt_description' => $request->shopt_description,
            'long_description' => $request->long_description,
            'price' => $request->price,
            'subcategory_id' => $request->subcategory_id,
            'provider_id' => $request->provider_id,
        ]);

        $this->tags()->sync($request->get('tags'));

        $this->generarCodigo($this);
    }
    
    public function generarCodigo($product)
    {
        $numero = $product->id;
        $numeroConCeros = str_pad($numero, 8, "0", STR_PAD_LEFT);
        $product->update(['code' => $numeroConCeros]);
    }

    public function upload_files($request, $product)
    {
        $urlImages = [];

        if($request->hasFile('images')) {
            $images = $request->file('images');
            foreach($images as $image){
                $image_name = time().$image->getClientOriginalName();
                $route = public_path().'/image';
                $image->move($route, $image_name);
                $urlImages[]['url'] = '/image/'.$image_name;
            }
        }

        $product->images()->createMany($urlImages);
    }
}

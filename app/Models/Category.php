<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'icon', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function my_store($request)
    {
        self::create([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'), 
            'icon' => $request->icon, 
            'description' => $request->description
        ]);
    }

    public function my_update($request)
    {
        $this->update([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'), 
            'icon' => $request->icon, 
            'description' => $request->description
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug', 'description'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function my_store($request)
    {
        self::create([
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'),
            'description' => $request->description,
        ]);
    }

    public function my_update($request)
    {
        $this->update([
            'category_id' => $request->category_id,
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'),
            'description' => $request->description,
        ]);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function my_store($request)
    {
        self::create([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'),
            'description' => $request->description
        ]);
    }

    public function my_update($request)
    {
        $this->update([
            'name' => $request->name, 
            'slug' => Str::slug($request->slug, '_'), 
            'description' => $request->description
        ]);
    }
}

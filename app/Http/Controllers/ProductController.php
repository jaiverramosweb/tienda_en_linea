<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Provider;
use App\Models\SubCategory;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('product_index'), 403);

        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('product_create'), 403);

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $providers = Provider::all();
        $tags = Tag::all();

        return view('admin.product.create', compact('categories', 'subcategories', 'providers', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Product $product)
    {
        $product->my_store($request);

        /* if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);

            $prod->update([
                'image' => $image_name
            ]);
        }  */

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), 403);

        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), 403);

        $categories = Category::all();
        $providers = Provider::all();
        $tags = Tag::all();

        return view('admin.product.edit', compact('product', 'categories', 'providers', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->my_update($request);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_destroy'), 403);

        $product->delete();

        return redirect()->route('products.index');
    }

    public function change_status(Product $product)
    {
        if ($product->status = 'ACTIVE') {
            $product->update(['status' => 'DEACTIVATED']);
        } else {
            $product->update(['status' => 'ACTIVE']);
        }
        return redirect()->back();
    }

    public function upload_image(Request $request,$id)
    {
        /* dd($request->hasFile('image')); */
        $product = Product::findOrFail($id);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("/image"), $image_name);
            $urlimage = '/image/'. $image_name;
        }

        $product->images()->create([
            'url' => $urlimage,
        ]);
    }
}

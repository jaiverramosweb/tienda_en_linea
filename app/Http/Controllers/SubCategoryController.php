<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubCategoryController extends Controller
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
        abort_if(Gate::denies('subcategories_index'), 403);
        $subcategories = SubCategory::all();

        return view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('subcategories_create'), 403);

        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SubCategory $subcategories)
    {
        $subcategories->my_store($request);

        return redirect()->route('subcategories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategories)
    {
        abort_if(Gate::denies('subcategories_show'), 403);

        return view('admin.subcategories.show', compact('subcategories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategories)
    {
        abort_if(Gate::denies('subcategories_edit'), 403);

        return view('admin.subcategories.edit', compact('subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategories)
    {
        $subcategories->my_update($request);

        return redirect()->route('subcategories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategories)
    {
        abort_if(Gate::denies('subcategories_destroy'), 403);

        $subcategories->delete();

        return redirect()->route('subcategories.index');
    }
}

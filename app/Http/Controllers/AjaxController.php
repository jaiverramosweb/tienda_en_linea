<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_subcategories(Request $request)
    {
        if ($request->ajax()) {
            $subcategories = SubCategory::where('category_id', $request->category)->get();

            return response()->json($subcategories);
        }
    }
}

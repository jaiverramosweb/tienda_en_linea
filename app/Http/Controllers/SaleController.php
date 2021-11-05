<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SaleController extends Controller
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
        abort_if(Gate::denies('sale_index'), 403);

        $sales = Sale::all();

        return view('admin.sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('sale_create'), 403);

        $clients = Client::all();
        $products = Product::all();
        
        return view('admin.sales.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $sale = Sale::create($request->all()+[
            'user_id' => $user->id,
            'sale_date' => Carbon::now('America/Bogota')
        ]);

        foreach ($request->product_id as $key => $product) {

            $sale->updated_stock($request->product_id[$key], $request->quantity[$key]);

            $results[] = array(
                "product_id" => $request->product_id[$key], 
                "quantity" => $request->quantity[$key], 
                "price" => $request->price[$key], 
                "discount" => $request->discount[$key]
            );
        }

        $sale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        abort_if(Gate::denies('sale_show'), 403);

        $saleDetails = $sale->saleDetails;

        $subtotal = 0;

        foreach ($saleDetails as $saleDetail) {
            $subtotal += $saleDetail->quantity * $saleDetail->price - $saleDetail->quantity * $saleDetail->price * $saleDetail->discount/100;
        }

        return view('admin.sales.show', compact('sale', 'saleDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        abort_if(Gate::denies('sale_edit'), 403);

        return view('admin.sales.edit', compact('sale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function change_status(Sale $sale)
    {
        if ($sale->status = 'VALID') {
            $sale->update(['status' => 'CANCELED']);
        } else {
            $sale->update(['status' => 'VALID']);
        }
        return redirect()->back();
    }
}

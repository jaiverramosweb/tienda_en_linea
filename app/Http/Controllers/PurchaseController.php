<?php

namespace App\Http\Controllers;

use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PurchaseController extends Controller
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
        abort_if(Gate::denies('purchase_index'), 403);
        
        $purchases = Purchase::all();

        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('purchase_create'), 403);

        $providers = Provider::all();
        $products = Product::all();

        return view('admin.purchase.create', compact('products', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $purchase = Purchase::create($request->all() + [
            'user_id' => Auth::user()->id,
            'purchase_date' => Carbon::now('America/Bogota')
        ]);        

        foreach ($request->product_id as $key => $id) {

            $purchase->updated_stock($request->product_id[$key], $request->quantity[$key]);

            $results[] = array(
                    "product_id" => $request->product_id[$key], 
                    "quantity" => $request->quantity[$key],
                    "price" => $request->price[$key]
                );
        }

        $purchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_show'), 403);

        $purchaseDetails = $purchase->purchaseDetails;

        $subtotal = 0;

        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        abort_if(Gate::denies('purchase_edit'), 403);

        return view('admin.purchase.edit', compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        //
    }

    public function upload(Request $request, Purchase $purchase)
    {

    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status = 'VALID') {
            $purchase->update(['status' => 'CANCELED']);
        } else {
            $purchase->update(['status' => 'VALID']);
        }
        return redirect()->back();
    }

    public function pdf(Purchase $purchase)
    {
        $purchaseDetails = $purchase->purchaseDetails;

        $subtotal = 0;

        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'purchaseDetails', 'subtotal'));

        return $pdf->stream('ReporteDeCompra_'.$purchase->id.'.pdf');
    }
}

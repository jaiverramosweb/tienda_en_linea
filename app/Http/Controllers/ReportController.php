<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        /* $this->middleware('can:reports.day')->only(['reports_day']);
        $this->middleware('can:reports.date')->only(['reports_date']);
        $this->middleware('can:reports.result')->only(['reports_result']); */
    }

    public function reports_day()
    {
        abort_if(Gate::denies('reports_day'), 403);
        
        $sales = Sale::whereDate('sale_date', Carbon::today('America/Bogota'))->get();
        $total = $sales->sum('total');
        return view('admin.reports.report_day', compact('sales', 'total'));
    }

    public function reports_date()
    {
        abort_if(Gate::denies('reports_date'), 403);

        $sales = Sale::whereDate('sale_date', Carbon::today('America/Bogota'))->get();
        $total = $sales->sum('total');
        return view('admin.reports.reports_date', compact('sales', 'total'));
    }

    public function reports_result(Request $request)
    {
        abort_if(Gate::denies('reports_result'), 403);

        $fi = $request->fecha_ini . '00.00.00';
        $ff = $request->fecha_fin . '23.59.59';

        $sales = Sale::whereBetween('date', [$fi, $ff])->get();

        $total = $sales->sum('total');

        //return redirect()->route('reports.date', compact('sales', 'total'));
        return view('admin.reports.reports_date', compact('sales', 'total'));
    }
}

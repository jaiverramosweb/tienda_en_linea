<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $compasmes = DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from  purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) desc limit 12');

        /* foreach ($compasmes as $reg)
        {
            setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
            $mes_traducido = strftime('%B', strtotime($reg->mes));

            echo '"'. $mes_traducido . '",';
        }  */


        $ventasmes = DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes FROM  sales v WHERE v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) desc limit 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, sum(v.total) as totaldia FROM sales v WHERE v.status="VALID" group by v.sale_date order by day(v.sale_date) desc limit 15');

        $totales = DB::select('SELECT (select ifnull(sum(c.total),0) FROM purchases c WHERE DATE(c.purchase_date)=curdate() and c.status="VALID") as totalcompra, (SELECT ifnull(sum(v.total),0) FROM sales v WHERE DATE(v.sale_date)=curdate() and v.status="VALID") as totalventa');

        //dd($totales);

        $productosvendidos = DB::select('SELECT p.code as code,
            sum(dv.quantity) as quantity, p.name as name, p.id as id, p.stock as stock FROM products p
            inner join sale_details dv on p.id=dv.product_id
            inner join sales v on dv.sale_id=v.id WHERE v.status="VALID"
            and year(v.sale_date)=year(curdate())
            group by p.code, p.name, p.id, p.stock order by sum(dv.quantity) desc limit 10');

        //dd($productosvendidos);

        return view('home', compact('compasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}

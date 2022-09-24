<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use App\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $currentPage = request()->get('page', 1);

        $sales = Cache::remember('sales_' . $currentPage, 10, function(){
            return Sale::with('user')->paginate(10);
        });

        // $sales = Sale::with('user')->paginate(100);

        return view('sale.index', compact('sales'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Sale;

class SaleController extends Controller
{
    public function index()
    {
        $currentPage = request()->get('page', 1);

        $sales = Cache::remember('sales_' . $currentPage, 10, function(){
            return Sale::paginate(10);
        });

        return view('sale.index', compact('sales'));
    }
}

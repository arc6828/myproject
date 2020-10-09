<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OrderProduct;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;

        $orderproduct = OrderProduct::whereNull('order_id')
            ->where('user_id', Auth::id() )
            ->latest()->paginate($perPage);

        return view('order-product.index', compact('orderproduct'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('order-product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        //คำนวณ total 
        $requestData['total'] = $requestData['quantity'] * $requestData['price'];

        //find user
        $requestData['user_id'] = Auth::id();

        OrderProduct::create($requestData);

        return redirect('order-product')->with('flash_message', 'OrderProduct added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.show', compact('orderproduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $orderproduct = OrderProduct::findOrFail($id);

        return view('order-product.edit', compact('orderproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $orderproduct = OrderProduct::findOrFail($id);
        $orderproduct->update($requestData);

        return redirect('order-product')->with('flash_message', 'OrderProduct updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        OrderProduct::destroy($id);

        return redirect('order-product')->with('flash_message', 'OrderProduct deleted!');
    }

    public function dailyreport(Request $request)
    {      
        $date = $request->get('date');
        //SELECT *, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::select(DB::raw('*, SUM(price) as sum_price, SUM(quantity) as sum_quantity, SUM(total) as sum_total'))
            ->whereDate('created_at',$date)
            ->groupByRaw('product_id')
            ->get();       
        return view('order-product.daily', compact('orderproduct'));
    } 

    public function monthlyreport(Request $request)
    {      
        $month = $request->get('month');
        $year = $request->get('year');
        //SELECT *, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::select(DB::raw('*, SUM(price) as sum_price, SUM(quantity) as sum_quantity, SUM(total) as sum_total'))
            ->whereMonth('created_at',$month)
            ->whereYear('created_at',$year)
            ->groupByRaw('product_id')
            ->get();       
        return view('order-product.monthly', compact('orderproduct'));
    } 

    public function yearlyreport(Request $request)
    {      
        $year = $request->get('year');
        //SELECT *, SUM(price) as sum_price, SUM(quantity) as sum_quantity FROM `order_products` GROUP BY product_id
        $orderproduct = OrderProduct::select(DB::raw('*, SUM(price) as sum_price, SUM(quantity) as sum_quantity, SUM(total) as sum_total'))
            ->whereYear('created_at',$year)
            ->groupByRaw('product_id')
            ->get();       
        return view('order-product.yearly', compact('orderproduct'));
    } 
}

<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use Illuminate\Http\data;
use Illuminate\Http\Request;
use App\Models\OrdersProducts;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class orderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Orders::paginate(10); 
        return view('/tables/orders',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::all();
        $customers = Customers::all();
        return view('/tables/createOrders',  compact('customers'), compact('products'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\data  $data
     * @return \Illuminate\Http\Response
     */
    public function validator(Request $data)
    {
         return Validator::make($data, [ 
          'pickup' => ['required', 'string', 'max:255'],
            'dropoff' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string',  'max:255', 'unique:users' ],
            'number' => ['required' , 'tel', 'max:10' , 'regex:/^((?:+|00)966)(5)(\d{8})$/'],
            'amount' => ['required' , 'string'],
            'descript' => ['required' , 'max:255'],           
        ]);

        
    }

    public function add(Request $data)
    {
        $orders = Orders::create([
            'customer_name' => $data->get('name'),
            'customer_number' => $data->get('number'),
            'pickup_location' => $data->get('pickup'),
            'dropoff_location' => $data->get('dropoff'),
            'order_descript' => $data->get('descript'),
            'order_amount' => $data->get('amount'),
            'customers_id' => $data->get('customers_id'),
        ]);
        $l = OrdersProducts::create([
            'orders_id' => $orders->id,
            'products_id' => $data->get('products_id'),
            'total' => $data->get('amount'),
            'quantity' => $data->get('quant'),
        ]);
      
        return redirect('/tables/orders');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Orders::find($id);
        return view('/tables/editOrders',['orders' => $orders] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $orders = Orders::find($id);
         return view('/tables/editOrders', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\data  $data
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, $id)
    {

         Validator::make($data->all(),[ 
          'pickup' => ['required', 'string', 'max:255'],
            'dropoff' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string',  'max:255', 'unique:users' ],
            'number' => ['required' , 'tel', 'max:10' , 'regex:/^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$/'],
            'amount' => ['required' , 'string'],
            'descript' => ['required' , 'max:255'],           
        ]);
        $orders = Orders::find($id)->update([
            'customer_name' => $data->get('name'),
            'customer_number' => $data->get('number'),
            'pickup_location' => $data->get('pickup'),
            'dropoff_location' => $data->get('dropoff'),
            'order_descript' => $data->get('descript'),
            'order_amount' => $data->get('amount'),

        ]);

        return redirect('/tables/orders');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Orders::find($id)->delete();
        return redirect('/tables/orders')->with('success', 'Order deleted success');
    }




    public function action(Request $request , $id)
    {
	  	 $orders = Orders::find($id)->update([
            'status' => $request->get('status'),
        ]);
         $order = OrdersProducts::find($id)->update([
            'status' => $request->get('status'),
        ]);
        return redirect('/tables/details/'. $id);
    }

    public function details($id){
        $orders = Orders::find($id);
        $op = OrdersProducts::find($id);
        $products = Products::find($op->products_id);
        $params = [
            'orders' => $orders,
            'op' => $op,
            'products' => $products,
        ];
        return view('/tables/details')->with($params);

    }
    
}

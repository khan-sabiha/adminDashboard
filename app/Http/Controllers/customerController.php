<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::paginate(8);

        return view('customers/main', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers/createCustomers');
    }

    public function validattor(Request $request)
    {
        return Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^(\+9665)(5|0|3|6|4|9|1)([0-9]{7})$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/[a-z0-9]+[\Wa-z0-9]*@gmail.com/i' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        Customers::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('customers/main');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('customers/editCustomers');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customers::find($id);
        return view('customers/editCustomers', compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'regex:/^((?:+|00)966)(5)(\d{8})$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','regex:/[a-z0-9]+[\Wa-z0-9]*@gmail.com/i' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $customers = Customers::find($id)->update([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

         return redirect('customers/main');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customers::find($id)->delete();
        return redirect('customers/main')->with('success', 'Customer deleted success');
    }
}

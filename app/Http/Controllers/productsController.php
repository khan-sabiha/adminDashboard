<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManagerStatic as Image;


class productsController extends Controller
{
     public function index()
    {
        $products = Products::paginate(7);
        
        return view('/products/main',compact('products'));
    }

    public function create()
    {
        return view('/products/createProducts');
    }

    public function validator(Request $data)
    {
         return Validator::make($data, [ 
          'pname' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'string',  'max:255'],
            'categories' => ['required'],
            'price' => ['required' , 'numeric'],
            'quantity' => ['required' , 'numeric' ,'max:255'],           
        ]);

        
    }

    public function store(Request $data)
    {
        if($data->hasFile('img')){

            $img = $data->file('img');
            $img_ext = $img->getClientOriginalName();
            $imgName = $img_ext;

            $destinationPath = public_path('images');

            $img_resize = Image::make($img->getRealPath())->resize(200,100, function ($constraint) {
            $constraint->aspectRatio();})->save($destinationPath.'/'. $imgName);
            
            $input['img'] = $imgName;

            $img->move(public_path('images') . $imgName , 100);

            Products::create([
                'p_name' => $data->get('pname'),
                'img' => $input['img'], 
                'p_descript' => $data->get('description'),
                'categories' => $data->get('categories'),
                'price' => $data->get('price'),
                'quantity' => $data->get('quantity'),
                
            ]);
            
            return redirect('/products/main');
        } 
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $products = Products::find($id);
         return view('/products/editProducts', compact('products'));
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
        Validator::make($data->all(), [ 
            'pname' => ['required', 'string', 'max:255'],
            'image' => ['mimes:jpeg,png,jpg,gif,svg'],
            'description' => ['required', 'string',  'max:255'],
            'categories' => ['required'],
            'price' => ['required' , 'numeric'],
            'quantity' => ['required' , 'numeric' ,'max:255'],           
        ]);

         if($data->hasFile('img')){

            $img = $data->file('img');
            $img_ext = $img->getClientOriginalName();
            $imgName = $img_ext;

            $destinationPath = public_path('images');

            $img_resize = Image::make($img->getRealPath())->resize(200,100, function ($constraint) {
            $constraint->aspectRatio();})->save($destinationPath.'/'. $imgName);
            
            $input['img'] = $imgName;

            $img->move(public_path('images') . $imgName , 100);

            $products = Products::find($id)->update([

                'p_name' => $data->get('pname'),
                'img' => $input['img'], 
                'p_descript' => $data->get('description'),
                'categories' => $data->get('categories'),
                'price' => $data->get('price'),
                'quantity' => $data->get('quantity'),
            ]);

            return redirect('/products/main');
        }
        else{
             $products = Products::find($id)->update([

                'p_name' => $data->get('pname'),
                'p_descript' => $data->get('description'),
                'categories' => $data->get('categories'),
                'price' => $data->get('price'),
                'quantity' => $data->get('quantity'),
            ]);
             
            return redirect('/products/main');
        }
         
        
      
        
    }


    public function destroy($id)
    {
        Products::find($id)->delete();
        return redirect('/products/main')->with('success', 'Order deleted success');
    }

}
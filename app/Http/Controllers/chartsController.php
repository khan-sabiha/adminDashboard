<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\OrdersProducts;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class chartsController extends Controller
{


    public function getMonths(){

        $month_array = array();
        $orders_dates = OrdersProducts::orderBy('created_at', 'ASC')->pluck('created_at');
        $orders_dates = json_decode($orders_dates);
        
        if (!empty($orders_dates)){
            foreach($orders_dates as $unformatted_date){
                $date = new \DateTime($unformatted_date);
                $month = $date->format('M');
                $month_no = $date->format('m');
                $month_array[$month_no] = $month;
            }
        }
        return $month_array;

    }

    public function getDataCount($month){

        $orders_count= Orders::whereMonth('created_at', $month)->get()->count();
        return $orders_count;

    }

    public function getOrdersData(){

       
        $monthly_orders_count_array = array();
        $month_array = $this->getMonths();
        $month_name_array = array();

        if (!empty($month_array)){
            foreach($month_array as $month_no => $month){
                $monthly_orders_count = $this->getDataCount($month_no);
                array_push($monthly_orders_count_array, $monthly_orders_count);
                array_push($month_name_array, $month);

            }
        }
     
        $month_array = $this->getMonths();
        $monthly_orders_data = array(
            'months' => $month_name_array,
            'orders_count_data' =>  $monthly_orders_count_array,
             );

        return array($month_name_array, $monthly_orders_count_array);
    }
    public function sales(){
        $dt = Carbon::now();
        $one_month_ago = $dt->subDays(365);
        $labels= [];
        $dataset = [];
        $sales = DB::table('orders_products')
                        ->where('status', 'Completed')->where('created_at', '>', $one_month_ago)
                        ->orderBy('created_at', 'ASC')
                        ->select(DB::raw("DATE_FORMAT(created_at, '%e-%c') as date"), DB::raw('SUM(`total`)as total'))
                        ->groupBy(DB::raw("DATE_FORMAT(created_at, '%Y %m %e')"))
                        ->get();
        foreach($sales as $sale){
            array_push($labels, $sale->date);
            array_push($dataset, $sale->total);
        }

      return array($labels, $dataset);
    }


    public function ordersCount(){
       
        $total = Orders::count();

        $completed = Orders::where('status', 'Completed')->count();

        $pending = Orders::where('status', 'Pending')->count();

        $canceled = Orders::where('status', 'Canceled')->count();
        
        $data = array();
        $data = $this->getOrdersData();
        $sales = $this->sales();


        $params =[
           'total' => $total,
           'completed' => $completed,
           'pending' => $pending,
           'canceled' => $canceled,
            'months' => $sales[0],
            'dataset' =>  $sales[1],
            'months_name' => $data[0],
        ];
        return view('admin.charts')->with($params);
   }
   
}
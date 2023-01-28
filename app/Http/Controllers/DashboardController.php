<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function titleChart() {
  
        $customer = DB::table('users')->groupBy('roles')->orderBy('roles')->pluck(DB::raw('count(roles) as total'),'roles')->all();
        $labels = (array_keys($customer));
        $data= array_values($customer);
        // dd($customer, $data, $labels);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }

    public function suppliesChart() {
        $supplies = DB::table('supplies as s')
                    ->join('stockline as sl', 's.supply_id', '=', 'sl.supply_id')
                    ->select(DB::raw('s.description as supply, sum(sl.quantity) as total'))
                    ->groupBy('s.description')
                    ->pluck('total','supply')
                    ->all();
                    
        $labels = (array_keys($supplies));
        $data= array_values($supplies);
        return response()->json(array('data' => $data, 'labels' => $labels));
    }
}

































// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use DB;

// class DashboardController extends Controller
// {
//     public function titleChart() {
//         $customer = DB::table('customers')->groupBy('title')->orderBy('total')->pluck(DB::raw('count(title) as total'),'title')->all();
//         $labels = (array_keys($customer));
        
//         $data= array_values($customer);
//         // dd($customer, $data, $labels);
//         return response()->json(array('data' => $data, 'labels' => $labels));
//     }

//     public function salesChart() {
        
//         $sales = DB::table('products as i')
//                     ->join('orderline as ol', 'i.product_id', '=', 'ol.product_id')
//                     ->join('orderinfo as oi', 'ol.orderinfo_id', '=', 'oi.orderinfo_id')
//                     ->select(DB::raw('monthname(oi.date_placed) as month, sum(ol.quantity * i.price) as total'))
//                     ->groupBy('oi.date_placed')
//                     ->pluck('total','month')
//                     ->all();
                    
//         // dd($sales);
//         $labels = (array_keys($sales));
        
//         $data= array_values($sales);
//         // dd($sales, $data, $labels);
//         return response()->json(array('data' => $data, 'labels' => $labels));
//     }

//     public function productsChart() {
        
//         $products = DB::table('products as i')
//                     ->join('orderline as ol', 'i.product_id', '=', 'ol.product_id')
//                     ->select(DB::raw('i.description as products, sum(ol.quantity) as total'))
//                     ->groupBy('i.description')
//                     ->pluck('total','products')
//                     ->all();
                    
//         // dd($products);
//         $labels = (array_keys($products));
        
//         $data= array_values($products);
//         // dd($sales, $data, $labels);
//         return response()->json(array('data' => $data, 'labels' => $labels));
//     }

//      public function datesChart() {
        
//         $dates = DB::table('products as i')
//                     ->join('orderline as ol', 'i.product_id', '=', 'ol.product_id')
//                     ->join('orderinfo as oi', 'ol.orderinfo_id', '=', 'oi.orderinfo_id')
//                     ->select(DB::raw('date(oi.date_placed) as month, sum(ol.quantity) as total'))
//                     ->groupBy('oi.date_placed')
//                     ->pluck('total','month')
//                     ->all();
                    
//         // dd($sales);
//         $labels = (array_keys($dates));
        
//         $data= array_values($dates);
//         // dd($sales, $data, $labels);
//         return response()->json(array('data' => $data, 'labels' => $labels));
//     }
// }
<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Supplies;
use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Carbon\Carbon;

use View;
use DB;
use File;
use Storage;
use Log;
use Auth;


class SuppliesController extends Controller
{
    //
    public function index(Request $request) 
    {
        if ($request->ajax())
        {
            $supplies = Supplies::orderBy('supply_id','DESC')->get();
            return response()->json($supplies);
        }
    }

    public function getSuppliesAll(Request $request){
            $supplies = Supplies::orderBy('supply_id','DESC')->get();
            return response()->json($supplies); 
    }


 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'description'=> 'required',
            'price'=> 'required|max:191',

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),

            ]);
        }else{   

        $supplies = new Supplies();
        $supplies->description = $request->description;
        $supplies->price = $request->price;
        
        $files = $request->file('uploads');

        $supplies->img_path = 'images/'.  $files->getClientOriginalName();
        $supplies->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "supply created successfully.", "supplies" => $supplies, "status" => 200]);
        }
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplies = Supplies::Find($id);
        return response()->json($supplies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $supplies = Supplies::find($id);
        $input = $request->all();

        $supplies->sdescription = $request->sdescription;
        $supplies->sprice = $request->sprice;
        
        // $supplier->save();
        // return response()->json($supplier);

        $files = $request->file('suploads');

        $supplies->img_path = 'images/' . $files->getClientOriginalName();
        Storage::put('public/images/' .$files->getClientOriginalName(), file_get_contents($files));
        $supplies->save($input);

        // Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Supplies updated successfully.", "supplies" => $supplies, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Supplies::findOrFail($id);
        $customer->delete();
        return response()->json($customer);   
    }

    public function postCheckout(Request $request)
    {
        $supplies = json_decode($request->getContent(),true);
        Log::info(print_r($supplies, true));
        
        try {
            DB::beginTransaction();
            $order = new Order();
            $order->date_placed = Carbon::now();
    
            $userid = Auth::user()->employees->employee_id;

            $employee = Employee::find($userid);
            $employee->orders()->save($order);
            //  dd($cart->supplies);
            // Log::info(print_r($order->stockinfo_id, true));
            foreach($supplies as $supply) {
               $id = $supply['supply_id'];
               $order->supplies()->attach($order->stockinfo_id,['quantity'=> $supply['quantity'],'supply_id'=>$id]);
            //    Log::info(print_r($order, true));
               $stock = Stock::find($id);
               $stock->quantity = $stock->quantity - $supply['quantity'];
               $stock->save();
            }
          }
            catch (\Exception $e) {
            DB::rollback();
              return response()->json(array('status' => 'Order Failed','code'=>409,'error'=>$e->getMessage()));
            }
      
            DB::commit();
            return response()->json(array('status' => 'Order Success','code'=>200 , 'order id'=>$order,'stock'=>$order));
    }//end postcheckout

}

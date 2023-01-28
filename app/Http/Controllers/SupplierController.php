<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Supplies;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use View;
use DB;
use File;
use Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('supplier.index');
    }

    public function getSupplierAll(Request $request){
            $supplier = Supplier::orderBy('supplier_id','DESC')->get();
            return response()->json($supplier);
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
            'name'=> 'required',
            'addressline'=> 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),

            ]);
        }else{   

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->addressline = $request->addressline;
        
        $files = $request->file('uploads');

        $supplier->img_path = 'images/'.  $files->getClientOriginalName();
        $supplier->save();

        Storage::put('public/images/'.$files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "supplier created successfully.", "supplier" => $supplier, "status" => 200]);
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
        $supplier = Supplier::Find($id);
        return response()->json($supplier);
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

        $supplier = Supplier::find($id);
        $input = $request->all();

        $supplier->name = $request->sname;
        $supplier->addressline = $request->saddressline;
        
        // $supplier->save();
        // return response()->json($supplier);

        $files = $request->file('suploads');

        $supplier->img_path = 'images/' . $files->getClientOriginalName();
        Storage::put('public/images/' .$files->getClientOriginalName(), file_get_contents($files));
        $supplier->save($input);

        // Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Supplier updated successfully.", "supplier" => $supplier, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Supplier::findOrFail($id);
        $customer->delete();
        return response()->json($customer);
        
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
Use App\Models\Customer;
use Illuminate\Support\Facades\Validator;


use DB;
use Redirect;
use View;
use Excel;
use File;
use Storage;
use Auth;


class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $customers = Customer::select("customer_id", DB::raw("CONCAT(fname,' ',lname) AS name"))->pluck('name','customer_id');
        return View::make('device.index',compact('customers'));
    }
 
    public function getAllDevice(Request $request){
            $device = Device::orderBy('device_id','DESC')->get();
            return response()->json($device);
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
            'customer_id'=> 'required',
            'type'=> 'required|max:191',
            'brand'=> 'required|max:191',
            'model'=> 'required|max:191',
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages(),

            ]);
        }else{   
            $device = new device;
            $device->customer_id = $request->customer_id;
            $device->type = $request->type;
            $device->brand = $request->brand;
            $device->model = $request->model;

            $files = $request->file('uploads');
            $device->img_path = 'images/'.time().'-'.$files->getClientOriginalName();
            
            $device->save();

            $data = array('status' => 'saved');
            Storage::put('public/images/'.time().'-'.$files->getClientOriginalName(), file_get_contents($files));

            return response()->json(["success" => "Device Created Successfully.","device" => $device ,"status" => 200]);
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $device = Device::find($id);
        return response()->json($device);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $device = device::find($id);

        $device->customer_id = $request->ccustomer_id;
        $device->type = $request->dtype;
        $device->brand = $request->dbrand;
        $device->model = $request->dmodel;

        $device->save();

        // return response()->json($device);
        
        $files = $request->file('duploads');

        $device->img_path = 'images/' . $files->getClientOriginalName();
        // $customer->update();
        $device->save();

        Storage::put('public/images/' . $files->getClientOriginalName(), file_get_contents($files));
        return response()->json(["success" => "Device updated successfully.", "device" => $device, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Device  $device
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $device = device::findOrFail($id);
        $device->delete();
        return response()->json(["success" => "device deleted successfully.","status" => 200]);
    }
}
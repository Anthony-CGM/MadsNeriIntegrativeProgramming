@extends('layouts.base')
@section('body')
@extends('layouts.app')
@extends('layouts.master')
{{-- @extends('layouts.master') --}}

<div class="container">
   <style> 
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style> 

    <div class="table-responsive">
        <table id="dtable" class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Device ID</th>
                    <th>Customer ID</th>
                    <th>Type</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="ibody">
            </tbody>
        </table>
    </div>
</div>

    {{-- tableModal --}}
    <div class="modal fade" id="deviceModal" role="dialog" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Device</h4>
            </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    <form id="dform" action="#" method="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control id" id="device_id" name="device_id">
                        </div>

                        <label for="customer_id" class="control-label">Customer Name:</label>
                        <select class="form-control" id="customer_id" name="customer_id">
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}"><a> {{ $customer }} </a></option>
                                 @endforeach
                        </select>

                        <div class="form-group">
                            <label for="type" class="control-label">Type</label>
                            <input type="text" class="form-control" id="type" name="type">
                        </div>
                        <div class="form-group">
                            <label for="brand" class="control-label">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand">
                        </div>
                        <div class="form-group">
                            <label for="model" class="control-label">Model</label>
                            <input type="text" class="form-control" id="model" name="model">
                        </div>
                        <div class="form-group">
                            <label for="img_path" class="control-label">Image</label>
                            <input type="file" class="form-control" id="img_path" name="uploads">
                        </div>
                    </form>
                </div>
            <div class="modal-footer" id="btnss">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button id="deviceSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
    </div>

    {{-- editModal --}}
    <div class="modal fade" id="editDeviceModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Device</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <form id="editform" method ="PUT" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                    <!-- <label for="sdevice_id" class="control-label">Device ID:</label> -->
                    <input type="hidden" class="form-control" id="ddevice_id" name="ddevice_id" disabled >
                </div>

                <label for="ccustomer_id" class="control-label">Customer Name:</label>
                        <select class="form-control" id="ccustomer_id" name="ccustomer_id">
                                @foreach($customers as $id => $customer)
                                    <option value="{{ $id }}"><a> {{ $customer }} </a></option>
                                 @endforeach
                        </select>

                <div class="form-group">
                    <label for="dtype" class="control-label">Type:</label>
                    <input type="text" class="form-control" id="dtype" name="dtype" >
                </div>
                <div class="form-group">
                    <label for="dbrand" class="control-label">Brand:</label>
                    <input type="text" class="form-control" id="dbrand" name="dbrand" >
                </div>
                <div class="form-group">
                    <label for="dmodel" class="control-label">Model:</label>
                    <input type="text" class="form-control" id="dmodel" name="dmodel">
                </div>
                <div class="form-group"> 
                    <label for="duploads" class="control-label">Image:</label>
                    <input type="file" class="form-control" id="duploads" name="duploads" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button id="deviceUpdate" type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </div>
</div>
@endsection
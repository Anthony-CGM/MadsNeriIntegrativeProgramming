@extends('layouts.base')
@section('body')
@extends('layouts.app')
@extends('layouts.master')


<div class="container">
   <style> 
        .modal-dialog{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    </style> 

    <!-- <button type="button" class="btn btn-info btn-lg" data-bs-toggle="modal" data-bs-target="#itemModal">Add<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
    <button type="button" class="btn btn-info btn-lg" id="customerbtn">Customer<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button> -->
<div id="supplier" class="container">
    <div class="table-responsive">
        <table id="stable" class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Supplier ID</th>
                    <th>Name</th>
                    <th>addressline</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="sbody">
            </tbody>
        </table>
    </div>
</div>
</div>

    {{-- tableModal --}}
    <div class="modal fade" id="supplierModal" role="dialog" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Supplier</h4>
            </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    <form id="sform" action="#" method="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control id" id="supplier_id" name="supplier_id">
                        </div>
                        <div class="form-group">
                            <label for="name" class="control-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="addressline" class="control-label">Addressline</label>
                            <input type="text" class="form-control" id="addressline" name="addressline">
                        </div>
                        <div class="form-group">
                            <label for="img_path" class="control-label">Image</label>
                            <input type="file" class="form-control" id="img_path" name="uploads">
                        </div>
                    </form>
                </div>
            <div class="modal-footer" id="btnss">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <button id="sSubmit" type="submit" class="btn btn-primary">Save</button>
            </div>

        </div>
    </div>
    </div>

    {{-- editModal --}}
    <div class="modal fade" id="editSupplierModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Suppliers</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <form id="editform" method ="PUT" action="#" enctype="multipart/form-data">
                <input type="hidden">
                <div class="form-group">
                    <!-- <label for="ssupplier_id" class="control-label">Service ID:</label> -->
                    <input type="hidden" class="form-control" id="ssupplier_id" name="ssupplier_id" disabled >
                </div>
                <div class="form-group">
                    <label for="sname" class="control-label">name:</label>
                    <input type="text" class="form-control" id="sname" name="sname" >
                </div>
                <div class="form-group">
                    <label for="saddressline" class="control-label">addressline:</label>
                    <input type="text" class="form-control" id="saddressline" name="saddressline">
                </div>
                <div class="form-group"> 
                    <label for="suploads" class="control-label">Image:</label>
                    <input type="file" class="form-control" id="suploads" name="suploads" >
                </div>
            </form>
        </div>
        <div class="modal-footer">
            
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            <button id="updateSup" type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </div>
</div>
@endsection
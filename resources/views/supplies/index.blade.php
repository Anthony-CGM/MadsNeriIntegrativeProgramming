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
<div id="supplies" class="container">
    <div class="table-responsive">
        <table id="sstable" class="table table-dark table-hover">
            <thead>
                <tr>
                    <th>Supplies ID</th>
                    <th>Description</th>
                    <th>Price</th>
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
    <div class="modal fade" id="suppliesModal" role="dialog" style="display:none">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Create New Supplies</h4>
            </div>
                <div class="modal-body">
                    <ul id="saveform_errList"></ul>
                    <form id="sform" action="#" method="#" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" class="form-control id" id="supplies_id" name="supplies_id">
                        </div>

                        {{-- <label for="supplier_id" class="control-label">Supplier Name:</label>
                        <select class="form-control" id="supplier_id" name="supplier_id">
                                @foreach($supplies as $id => $supplies)
                                    <option value="{{ $id }}"><a> {{ $supplier }} </a></option>
                                 @endforeach
                        </select> --}}

                        <label for="supplier_id" class="control-label">Supplier Name:</label>
                        <select class="form-control" id="supplier_id" name="supplier_id">
                                @foreach($supplies as $id => $supplier)
                                    <option value="{{ $id }}"><a> {{ $supplier }} </a></option>
                                 @endforeach
                        </select>

                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description">
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
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
    <div class="modal fade" id="editSuppliesModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Supplies</h5>
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
                    <label for="sdescription" class="control-label">Description:</label>
                    <input type="text" class="form-control" id="sdescription" name="sdescription" >
                </div>
                <div class="form-group">
                    <label for="sprice" class="control-label">Price:</label>
                    <input type="text" class="form-control" id="sprice" name="sprice">
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
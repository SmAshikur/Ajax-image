@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div id="king">
                        @include('ajax_child')
                       </div>
                </div>
                <div class="card-footer d-flex justify-content-center">
                    {{$data->links()}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card" id="-add">
                <div class="card-header d-flex justify-content-center">
                    <h2>Add </h2>
                </div>
                <form method="post" id="addForm" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name"   placeholder="Enter name" class="form-control"><br>
                            <span id="Errname" class="text-danger"><i></i></span>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" placeholder="Enter image" class="form-control"><br>
                            <span id="Errimage" class="text-danger"><i></i></span>

                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address"  placeholder="Enter address" class="form-control"><br>
                            <span id="Erraddress" class="text-danger"><i></i></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile"   placeholder="Enter mobile" class="form-control"><br>
                            <span id="Errmobile" class="text-danger"><i></i></span>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group d-flex justify-content-center">
                            <button id="btn-add" type="submit" class="btn btn-success">Add</button>

                        </div>
                    </div>
                </form>
            </div>
            @include('new')

        </div>
    </div>
</div>
@endsection

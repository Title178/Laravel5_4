@extends('master')
@section('title',env('APP_NAME'))

@section('title_page')
Position Page
@endsection
@section('content')


<i class="fa fa-book" aria-hidden="true"></i>

<button class="btn btn-outline-primary" style="float:right;text-align:center;" data-toggle="modal" data-target="#myModal"><b>
    <i class="fa-add"></i>Add</b>
</button>
<br>
@if($errors->all())
<br><br><br>
<div class="alert alert-danger">
@foreach ($errors->all() as $error)
    <li>{{$error}}</li>
@endforeach
</div>
@endif
<!-- The Modal -->
<div class="modal fade " id="myModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

        <form action="/position" method="post">
        {{ csrf_field() }}
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Position</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <label>Position Name</label>
                <input type="text" class="form-control" name="position_name"> <br>
        
                <label for="">Company</label>
                <select name="company_id"class="form-control">
                     <option value="">--กรุณาเลือก--</option>
                    <option value="1">บริษัทหลัก</option>
                    <option value="2">บริษัทย่อย</option>
                </select>
     
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="submit" class="btn btn-success">
            </div>
        </form>
        </div>
    </div>
</div>
<!-- End  Modal Add -->
<br><br>

<table class="table table-bordered table-striped">
    <thead>
        <tr style="text-align:center" class="table-warning">
            <th>No.</th>
            <th>Name Position</th>
            <th>Date at</th>
            <th>Date edit</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach($positions as $key => $value)
        <tr>
            <td align="center">{{$key+1}}</td>
            <td>{{$value->position_name}}</td>
            <td>{{date_only($value->created_at)}}</td>
            <td>{{date_only($value->updated_at)}}</td>
            <td align="center"><i class=" fa-edit"></i></td>
            <td align="center"><i class="fa-delete"></i></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection



@extends('master')
@section('title',env('APP_NAME'))

@section('title_page')

Position Edit <br>
<a href="{{url('/positions')}}"><button type="button" class="btn btn-primary">Back</button></a>
@endsection

@section('content')

<?php 
$check1 = ($position->company_id=='1') ? 'selected' : '' ;
$check2 = ($position->company_id=='2') ? 'selected' : '' ; 

?>

<form action="/position/{{$position->id}}" method="post">
    {{ method_field('PUT') }}
    {{ csrf_field() }}

    @if($errors->all())
    
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <label>Position Name</label>
            <input type="text" class="form-control" name="position_name" value="{{$position->position_name}}"> <br>
        </div>
        <div class="col-md-6">
            <label for="">Company</label>
            <select name="company_id" class="form-control">
                <option value="">--กรุณาเลือก--</option>
                <option value="1" <?= $check1?>>บริษัทหลัก</option>
                <option value="2" <?= $check2?>>บริษัทย่อย</option>
            </select>
        </div>
    </div>
    <div style="text-align:center">
        <input type="submit" class="btn btn-success" value="Update">
    </div>

</form>

@endsection
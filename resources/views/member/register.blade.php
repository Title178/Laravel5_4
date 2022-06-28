@extends('master')
@section('title','Homepage')


@section('title_page')
Register
@endsection

@section('content')

@if($errors->all())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </div>
@endif

{!! Form::open(['route' => 'member.register', 'method' => 'POST']) !!}
<?php 

?>
<div class="row">
    <div class="col-md-6">
        <?= Form::label('Name'); ?>
        <?= Form::text('name',null,['class' => 'form-control my-1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Lastname'); ?>
        <?= Form::text('lastname',null,['class' => 'form-control my-1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Email'); ?>
        <?= Form::email('email',null,['class' => 'form-control my-1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Tel.'); ?>
        <?= Form::number('tel',null,['class' => 'form-control my-1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Position'); ?>
        <?php 
            $list = $posotions;
            echo Form::select('position_id', $list, null, ['placeholder' => '--กรุณาเลือก--','class'=>'form-control my-1','required'=>'required']);
        ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Username.'); ?>
        <?= Form::text('username',null,['class' => 'form-control my-1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Password'); ?>
        <?= Form::password('password',['class' => 'form-control','id'=>'pw1','required'=>'required']); ?>
    </div>
    <div class="col-md-6">
        <?= Form::label('Password Again'); ?>
        <?= Form::password('password_confirmation',['class' => 'form-control','required'=>'required']); ?>
    </div>
</div>

<div style="text-align:center" class="my-3">
    <?=  Form::submit('Register',['class'=>'btn btn-success']); ?>
</div>

{!! Form::close() !!}
@endsection
@extends('master')
@section('title','Homepage')


@section('title_page')
Register
@endsection

@section('content')

<div class="table-responsive">
    <table class="table table-bordered table-striped" id="dataTable">
        <thead>
            <tr style="text-align:center">
                <th>ลำดับ</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Position</th>
                <th>Register Date</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $key => $data)
            <tr style="text-align:center">
                <td>{{$key+1}}</td>
                <td align='left'>{{$data->name}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->position->position_name}}</td>
                <td>{{$data->created_at->diffForHumans()}}</td>
                <td><a href=""><i class="fa fa-edit"></i></a></td>
                <td><a href=""><i class="fa fa-delete"></td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<script>
    $('#dataTable').DataTable();
</script>
@endsection
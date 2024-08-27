@extends('admin/layout')
@section('page_title','Size')
@section('container')
@section('Size_active','active')
<div class="col-lg-12">
<h1>Manage Size </h1>
    <a class="btn btn-success form-group" href="{{route('admin.size.addSizePage')}}">Add New</a>
    @if(session('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif
    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-earning table-striped ">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Size</th>
                    <th class="">Created At</th>
                    <th>Actions</th>
                </tr>
                
            </thead>
            <tbody>
            @foreach($results as $result)
                    <tr>
                        <td>{{$result->id}}</td>
                        <td>{{$result->size}}</td>
                        <td>{{$result->created_at}}</td>
                        <td>
                        <a class="btn btn-primary" href="{{route('admin.size.edit',['id'=>$result->id])}}">EDIT</a>
                        <form method="POST" style=" display:inline-block " action="{{route('admin.size.delete',$result->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit"> DELETE</button>
                        </form>
                        @if($result->status == 1)
                            <a class="btn btn-warning" href="{{route('admin.size.status',[$result->id,0])}}">Deactive</a>
                            @else
                            <a class="btn btn-success" href="{{route('admin.size.status', [$result->id,1] )}}">Active</a>
                        @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
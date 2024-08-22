@extends('admin/layout');
@section('container');
@section('page_title','Category');
<div class="col-lg-12">
    <div>
        @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
        @endif
    </div>
    <div class="form-group">
        <h1> Categoty List</h1>
    </div>
    <div class="form-group">
        <a href="{{route('admin.manage_category')}}">
            <button type="button" class="btn btn-success">Add</button>
        </a>

    </div>

    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Category Slug</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->caregory_name}}</td>
                    <td>{{$row->caregory_slug}}</td>
                    <td class="text-right">
                    <form action="{{ route('admin.category.delete', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>|
                    </form>
                    <a class="btn btn-primary" href="{{route('admin.category.edit', $row->id)}}">Edit</a>


                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
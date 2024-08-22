@extends('admin/layout');
@section('page_title',Manage Category');
@section('container')

<div class="col-lg-6">
<div class="form-group">
<h1>Manage Categoty</h1>
</div>
<div class="form-group">
<a href="{{route('admin.category')}}">
    <button type="button" class="btn btn-success">Back</button>
</a>
</div>
    <div class="card form-group">
        <form action="{{route('admin.manage_category_proccess')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{old('id', $result->id ?? '')}}" >
        <div class="card-body card-block">
            <div class="form-group">
                <label for="category" class=" form-control-label">Category</label>
                <input required type="text" id="category" name="category" value="{{old('category',$result->caregory_name ?? '')}}" placeholder="Enter your category name" class="form-control">
                @error('category')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="category_slug" class=" form-control-label">Category Slug</label>
                <input required type="text" id="category_slug" name="category_slug" value="{{old('caregory_slug',$result->caregory_slug ?? '')}}"  placeholder="Enter your category slug name" class="form-control">
            </div>
            @error('category_slug')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="submit">
            </div>
        </div>
        </form>
    </div>
</div>
@endsection
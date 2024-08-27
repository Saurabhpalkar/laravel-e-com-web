@extends('admin/layout')
@section('page_title','add Coupon')

@section('container')
<div class="col-lg-6">
    <div class="form-group">
        <h1>Manage Coupon</h1>
    </div>
    <div class="form-group">
        <a href="{{route('admin.coupon')}}">
            <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>
    <div class="card p-5">
        <form action="{{route('admin.coupon.add')}}" method="post" >
            @csrf
            <div class="form-group">    
                <label for="title" class="control-label mb-1">Title</label>
                <input id="title" name="title" type="text"  class="form-control"   value="{{old('title',$results->title ?? '')}}">
            @error('title')
            <div class="alert alert-danger"> {{$message}} </div>
            @enderror
            </div>
            <div class="form-group has-success">
                <label for="code" class="control-label mb-1">Code</label>
                <input id="code" name="code" value="{{old('code',$results->code ?? '')}}"  type="text" class="form-control code valid" >
            @error('code')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
            </div>
            <div class="form-group">
                <label for="value" class="control-label mb-1">Value</label>
                <input id="value" name="value" type="text"  value="{{old('value',$results->value ?? '')}}"   class="form-control value identified visa" value="">
            @error('value')
                <div class="alert alert-danger"> {{$message}} </div>
            @enderror
            </div>
            <div class="form-group">
                    <input type="text" name="id" value="{{old('id',$results->id ?? '')}}">
            </div>
            <button id="add-xbutton" type="submit" class="btn btn-lg btn-info btn-block">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
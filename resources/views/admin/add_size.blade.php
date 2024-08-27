@extends('admin/layout')
@section('page_title','add Size')

@section('container')
<div class="col-lg-6">
    <div class="form-group">
        <h1>Manage Size</h1>
    </div>
    <div class="form-group">
        <a href="{{route('admin.size')}}">
            <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>
    <div class="card p-5">
        <form action="{{route('admin.size.add')}}" method="post" >
            @csrf
            <div class="form-group">    
                <label for="size" class="control-label mb-1">Size</label>
                <input id="size" name="size" type="text"  class="form-control"   value="{{old('size',$results->size ?? '')}}">
                @error('size')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
          
            <div class="form-group">
                    <input type="hidden" name="id" value="{{old('id',$results->id ?? '')}}">
            </div>
            <button id="add-xbutton" type="submit" class="btn btn-lg btn-info btn-block">SUBMIT</button>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
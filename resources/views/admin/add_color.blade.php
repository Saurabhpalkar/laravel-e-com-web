@extends('admin/layout')
@section('page_title','add color')

@section('container')
<div class="col-lg-6">
    <div class="form-group">
        <h1>Manage color</h1>
    </div>
    <div class="form-group">
        <a href="{{route('admin.color')}}">
            <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>
    <div class="card p-5">
        <form action="{{route('admin.color.add')}}" method="post" >
            @csrf
            <div class="form-group">    
                <label for="color" class="control-label mb-1">color</label>
                <input id="color" name="color" type="text"  class="form-control"   value="{{old('color',$results->color ?? '')}}">
                @error('color')
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
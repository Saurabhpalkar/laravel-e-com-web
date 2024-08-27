@extends('admin/layout')
@section('page_title','add product')

@section('container')
<div class="col-lg-6">
    <div class="form-group">
        <h1>Manage product</h1>
    </div>
    <div class="form-group">
        <a href="{{route('admin.product')}}">
            <button type="button" class="btn btn-success">Back</button>
        </a>
    </div>
    <div class="card p-5">
        <form action="{{route('admin.product.add')}}" method="post" >
            @csrf
        
            <div class="form-group">    
                <label for="name" class="control-label mb-1">name</label>
                <input id="name" name="name" type="text"  class="form-control"   value="{{old('name',$results->name ?? '')}}">
                @error('name')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="slug" class="control-label mb-1">slug</label>
                <input id="slug" name="slug" type="file"  class="form-control"   value="{{old('slug',$results->slug ?? '')}}">
                @error('slug')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>  
            <div class="form-group">    
                <label for="img" class="control-label mb-1">img</label>
                <input id="img" name="img" type="text"  class="form-control"   value="{{old('img',$results->img ?? '')}}">
                @error('img')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>    
            <div class="form-group">    
                <label for="categories_name" class="control-label mb-1">Categories</label>
                <select name="categories_name" class="form-control" id="categories_name">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->caregory_name}}</option>
                    @endforeach
                </select>
                @error('name')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
                <!-- <option value="{{ $category->id }}" {{ old('category_id', $results->category_id ?? '') == $category->id ? 'selected' : '' }}> -->
              
            </option>
            </div>  
   
            <div class="form-group">    
                <label for="brand" class="control-label mb-1">brand</label>
                <input id="brand" name="brand" type="text"  class="form-control"   value="{{old('brand',$results->brand ?? '')}}">
                @error('brand')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="model" class="control-label mb-1">model</label>
                <input id="model" name="model" type="text"  class="form-control"   value="{{old('model',$results->model ?? '')}}">
                @error('model')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="short_desc" class="control-label mb-1">short_desc</label>
                <input id="short_desc" name="short_desc" type="text"  class="form-control"   value="{{old('short_desc',$results->short_desc ?? '')}}">
                @error('short_desc')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="desc" class="control-label mb-1">desc</label>
                <input id="desc" name="desc" type="text"  class="form-control"   value="{{old('desc',$results->desc ?? '')}}">
                @error('desc')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="keyword" class="control-label mb-1">keyword</label>
                <input id="keyword" name="keyword" type="text"  class="form-control"   value="{{old('keyword',$results->keyword ?? '')}}">
                @error('keyword')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>
            <div class="form-group">    
                <label for="technical_specification" class="control-label mb-1">technical_specification</label>
                <input id="technical_specification" name="technical_specification" type="text"  class="form-control"   value="{{old('technical_specification',$results->technical_specification ?? '')}}">
                @error('technical_specification')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>     

            <div class="form-group">    
                <label for="uses" class="control-label mb-1">uses</label>
                <input id="uses" name="uses" type="text"  class="form-control"   value="{{old('uses',$results->uses ?? '')}}">
                @error('uses')
                <div class="alert alert-danger"> {{$message}}</div>
                @enderror
            </div>     

            <div class="form-group">    
                <label for="warranty" class="control-label mb-1">warranty</label>
                <input id="warranty" name="warranty" type="text"  class="form-control"   value="{{old('warranty',$results->warranty ?? '')}}">
                @error('warranty')
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
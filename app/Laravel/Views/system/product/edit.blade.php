@extends('system._layouts.main')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-md-8">
      @include('system._components.notifications')
      <div class="panel panel-default panel-border-color panel-border-color-success">
        <div class="panel-heading panel-heading-divider">Update Record Form<span class="panel-subtitle">Areas information.</span></div>
        <div class="panel-body">
          <form method="POST" action="" enctype="multipart/form-data">
            {!!csrf_field()!!}
       
            <div class="mb-3 text-center">
                <img id="blah_primary_back" src="{{asset('uploads/images/'.$category->file_name)}}" style="width: auto;height: 200px;" alt="" />
            </div>
            <div class="form-group {{$errors->first('file') ? 'has-error' : NULL}}">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" type="file" accept="image/png, image/gif, image/jpeg" name="file" placeholder="file" id="img_primary_back">
                </div>
            </div>
            <div class="form-group {{$errors->first('name') ? 'has-error' : NULL}}">
              <label>Product Name</label>
              <input type="text" placeholder="" class="form-control" name="name" value="{{old('name',$category->name)}}">
              @if($errors->first('name'))
              <span class="help-block">{{$errors->first('name')}}</span>
              @endif
            </div>
            <div class="form-group {{$errors->first('description') ? 'has-error' : NULL}}">
              <label>Description</label>
              <textarea class="form-control" name="description">{{old('description',$category->description)}}</textarea>
              @if($errors->first('description'))
              <span class="help-block">{{$errors->first('description')}}</span>
              @endif
            </div>
            <div class="form-group {{$errors->first('price') ? 'has-error' : NULL}}">
              <label>Price</label>
              <input type="text" placeholder="" class="form-control" readonly name="price" value="{{old('price',$category->price)}}">
              @if($errors->first('price'))
              <span class="help-block">{{$errors->first('price')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('status') ? 'has-error' : NULL}}">
              <label>Status</label>
              <select class="form-control" name="status">
              @if($category->status == 'available')
                  <option value="available" selected>Available</option>
                  <option value="not available">Not Available</option>
               
              @endif
              @if($category->status == 'not available')
              <option value="available" >Available</option>
                  <option value="not available" selected>Not Available</option>
              @endif
             
              </select>
              @if($errors->first('status'))
              <span class="help-block">{{$errors->first('status')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('category') ? 'has-error' : NULL}}">
              <label>Category</label>
              <select class="form-control" name="category"> 
                <option selected disabled>--Select Category--</option>
                @foreach ($categories as $categoryData)
                    <option selected="{{ $category->category }}" value="{{ $categoryData->name }}">{{ $categoryData->name }}</option>
                @endforeach
              </select>
              @if($errors->first('category'))
              <span class="help-block">{{$errors->first('category')}}</span>
              @endif
            </div>
 
            
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                  <button type="submit" class="btn btn-space btn-success">Update Record</button>
                  <a href="{{route('system.product.index')}}" class="btn btn-space btn-default">Cancel</a>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@stop




@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/summernote/summernote.css')}}"/>
@stop

@section('page-scripts')
<script src="{{asset('assets/lib/summernote/summernote.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
    $('.editor').summernote({height:300})
  })
</script>
<script>
      img_primary_back.onchange = evt => {
  const [file] = img_primary_back.files
  if (file) {
    blah_primary_back.src = URL.createObjectURL(file)
  }
}
</script>
@stop
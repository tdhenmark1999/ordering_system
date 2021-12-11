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
       
            <div class="form-group {{$errors->first('area_code') ? 'has-error' : NULL}}">
              <label>Area Code</label>
              <input type="text" placeholder="" class="form-control" readonly name="area_code" value="{{old('area_code',$area->area_code)}}">
              @if($errors->first('area_code'))
              <span class="help-block">{{$errors->first('area_code')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('desc') ? 'has-error' : NULL}}">
              <label>Desc</label>
              <input type="text" placeholder="" class="form-control" name="desc" value="{{old('desc',$area->desc)}}">
              @if($errors->first('desc'))
              <span class="help-block">{{$errors->first('desc')}}</span>
              @endif
            </div>


            <div class="form-group {{$errors->first('floor') ? 'has-error' : NULL}}">
              <label>Floor Num</label>
              <select class="form-control" name="floor">
              @if($area->floor == 'Ground')
                  <option selected>Ground</option>
                  <option>2nd Floor</option>
                  <option>3rd Floor</option>
              @endif
              @if($area->floor == '2nd Floor')
                  <option >Ground</option>
                  <option selected>2nd Floor</option>
                  <option>3rd Floor</option>
              @endif
              @if($area->floor == '3rd Floor')
                  <option >Ground</option>
                  <option>2nd Floor</option>
                  <option selected>3rd Floor</option>
              @endif
              </select>
              @if($errors->first('floor'))
              <span class="help-block">{{$errors->first('floor')}}</span>
              @endif
            </div>

            
            <div class="form-group {{$errors->first('row') ? 'has-error' : NULL}}">
              <label>Row</label>
              <select class="form-control" name="row">
              @if($area->row == '1')
                  <option selected>1</option>
                  <option>2</option>
                  <option >3</option>
              @endif
              @if($area->row == '2')
                  <option >1</option>
                  <option selected>2</option>
                  <option >3</option>
              @endif
              @if($area->row == '3')
                  <option >1</option>
                  <option>2</option>
                  <option selected>3</option>
              @endif
              </select>
              @if($errors->first('row'))
              <span class="help-block">{{$errors->first('row')}}</span>
              @endif
            </div>

            
            <div class="form-group {{$errors->first('col') ? 'has-error' : NULL}}">
              <label>Col</label>
              <select class="form-control" name="col">
              @if($area->col == '1')
                  <option selected>1</option>
                  <option>2</option>
                  <option >3</option>
              @endif
              @if($area->col == '2')
                  <option >1</option>
                  <option selected>2</option>
                  <option >3</option>
              @endif
              @if($area->col == '3')
                  <option >1</option>
                  <option>2</option>
                  <option selected>3</option>
              @endif
              </select>
              @if($errors->first('col'))
              <span class="help-block">{{$errors->first('col')}}</span>
              @endif
            </div>

 
            
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                  <button type="submit" class="btn btn-space btn-success">Update Record</button>
                  <a href="{{route('system.areas.index')}}" class="btn btn-space btn-default">Cancel</a>
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
@stop
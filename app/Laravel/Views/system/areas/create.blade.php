@extends('system._layouts.main')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-md-8">
      @include('system._components.notifications')
      <div class="panel panel-default panel-border-color panel-border-color-success">
        <div class="panel-heading panel-heading-divider">Create Record Form<span class="panel-subtitle">Areas information.</span></div>
        <div class="panel-body">
          <form method="POST" action="" enctype="multipart/form-data">
            {!!csrf_field()!!}
            
            <div class="form-group {{$errors->first('area_code') ? 'has-error' : NULL}}">
              <label>Area Code</label>
              <input maxlength="16" size="16" readonly id="area_code" type="text" placeholder="Area Code" class="form-control" name="area_code" value="{{old('area_code')}}">
              @if($errors->first('area_code'))
              <span class="help-block">{{$errors->first('area_code')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('desc') ? 'has-error' : NULL}}">
              <label>Desc</label>
              <input type="text" placeholder="Desc" class="form-control" name="desc" value="{{old('desc')}}">
              @if($errors->first('desc'))
              <span class="help-block">{{$errors->first('desc')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('floor') ? 'has-error' : NULL}}">
              <label>Floor Num</label>
              <select class="form-control" name="floor"> 
                  <option selected disabled>--Select a Floor Num--</option>
                  <option>Ground</option>
                  <option>2nd Floor</option>
                  <option>3rd Floor</option>
              </select>
              @if($errors->first('floor'))
              <span class="help-block">{{$errors->first('floor')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('row') ? 'has-error' : NULL}}">
              <label>Row</label>
              <select class="form-control" name="row"> 
              <option selected disabled>--Select a row--</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
              </select>
              @if($errors->first('row'))
              <span class="help-block">{{$errors->first('row')}}</span>
              @endif
            </div>

            <div class="form-group {{$errors->first('col') ? 'has-error' : NULL}}">
              <label>Col</label>
              <select class="form-control" name="col"> 
              <option selected disabled>--Select a col--</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
              </select>
              @if($errors->first('col'))
              <span class="help-block">{{$errors->first('col')}}</span>
              @endif
            </div>
     

     
            
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                  <button type="submit" class="btn btn-space btn-success">Add</button>
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

  function randomNumber(len) {
    var randomNumber;
    var n = '';

    for(var count = 0; count < len; count++) {
        randomNumber = Math.floor(Math.random() * 10);
        n += randomNumber.toString();
    }
    return n;
}



window.onload = function() {
document.getElementById("area_code").value = randomNumber(9);
};
</script>


@stop
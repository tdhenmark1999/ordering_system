@extends('system._layouts.main')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-md-8">
      @include('system._components.notifications')
      <div class="panel panel-default panel-border-color panel-border-color-success">
        <div class="panel-heading panel-heading-divider">Preview Record Form<span class="panel-subtitle">Areas information.</span></div>
        <div class="panel-body">
          <form method="POST" action="" enctype="multipart/form-data">
            {!!csrf_field()!!}

            <div class="row">
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R1C1</p>
                   
                  @if($area->col == '1' && $area->row == '1')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R1C2</p>
                    
                  @if($area->col == '2' && $area->row == '1')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R1C3</p>
                    
                  @if($area->col == '3' && $area->row == '1')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R2C1</p>
                    
                  @if($area->col == '1' && $area->row == '2')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R2C2</p>
                    
                  @if($area->col == '2' && $area->row == '2')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R2C3</p>
                    
                  @if($area->col == '3' && $area->row == '2')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R3C1</p>
                   
                  @if($area->col == '1' && $area->row == '3')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R3C2</p>
                  
                  @if($area->col == '2' && $area->row == '3')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif
                </div>
              </div>
              <div class="col-md-4">
                <div style="border:1px solid #333;padding:10px;text-align:center">
                  <p>R3C3</p>
                  
                  @if($area->col == '3' && $area->row == '3')
                  <button class="btn" style="background-color:gray;color:white" disabled>Occupied</button>
                  @else
                  <button class="btn bg-primary">Available</button>
                  @endif

                </div>
              </div>

              
            </div>
            
            <div class="row xs-pt-15">
              <div class="col-xs-6">
                  <!-- <button type="submit" class="btn btn-space btn-success">Update Record</button> -->
                  <a href="{{route('system.areas.index')}}" class="btn btn-space btn-default">Back</a>
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
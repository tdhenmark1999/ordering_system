@extends('system._layouts.main_user')

@section('content')
<div class="main-content container-fluid">
  <div class="row">
    <div class="col-md-12">
      @include('system._components.notifications')
      <div class="panel panel-default panel-table  panel-border-color panel-border-color-success">
        <div class="panel-heading">List of Food
          <!-- <div class="tools dropdown">
            <a href="#" type="button" data-toggle="dropdown" class="dropdown-toggle"><span class="icon mdi mdi-more-vert"></span></a>
            <ul role="menu" class="dropdown-menu pull-right">
              <li><a href="{{route('system.product.create')}}">Add new record</a></li>
             
            </ul>
          </div> -->
        </div>
        <div class="panel-body container" style="padding:20px">
          <div class="row" style="">
          @forelse($products as $item)
          <div class="col-md-4">
            @if($item->status == 'not available')
            <input disabled="" type="checkbox" id="myCheckbox{{$item->id}}" />
            @else
            <input type="checkbox" id="myCheckbox{{$item->id}}" />

            @endif
            <label class="order_check" for="myCheckbox{{$item->id}}">
            <h3 style="margin-top:10px !important;margin-bottom:10px !important;text-transform:uppercase">{{$item->name}} -  {{$item->category}} <br>
            @if($item->status == 'not available')
            <span class="bg-danger text-white p-3" style="font-size:12px;padding:5px 10px;border-radius:5px">{{$item->status}}</span>
            @else
             <span class="bg-green text-white p-3" style="font-size:12px;padding:5px 10px;border-radius:5px">{{$item->status}}</span>
             @endif
            </h3>
              <img src="{{asset('uploads/images/'.$item->file_name)}}" style="width: auto;height: 120px;"/>
              <div style="">
                <h2> PHP {{$item->price}}</h2>
                <span>{{$item->description}}</span>
              </div>
            </label>
          
          </div>
         
        
          @empty
          <div class="col-md-12">
          <p>No Food Available</p>
            <div>
              @endforelse
              <div class="col-md-12 text-center" style="margin-bottom:20px">
                <button class="btn bg-green text-white ">Checkout</button>
            <div>
        </div>
          <!-- <table class="table table-hover table-wrapper">
            <thead>
              <tr>
                <th></th>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Price</th>
                <th>Category</th>
                <th class="actions"></th>
              </tr>
            </thead>
            <tbody>
              @forelse($products as $index => $new)
              <tr>
              <td class="cell-detail"> 
                  <span> <img id="blah_primary_back" src="{{asset('uploads/images/'.$new->file_name)}}" style="width: auto;height: 100px;" alt="" /></span>
                </td>
                <td class="cell-detail"> 
                  <span>{{$new->id}}</span>
                </td>
                <td class="cell-detail"> 
                  <span>{{$new->name}}</span>
                </td>
                <td class="cell-detail"> 
                  <span>{{$new->description}}</span>
                </td>
                <td class="cell-detail">
                  <span>{{$new->status}}</span>
                 
                </td>
                <td class="cell-detail">
                  <span>PHP {{$new->price}}</span>
                 
                </td>
                <td class="cell-detail">
                  <span>{{$new->category}}</span>
                 
                </td>
                <td class="actions">
                    <div class="btn-group btn-hspace">
                      <button type="button" data-toggle="dropdown" class="btn btn-default dropdown-toggle" aria-expanded="false"><i class="icon icon-left mdi mdi-settings"></i> Actions <span class="icon-dropdown mdi mdi-chevron-down"></span></button>
                      <ul role="menu" class="dropdown-menu">
                        <li><a href="{{route('system.product.edit',[$new->id])}}">Edit Record</a></li>
                        <li class="divider"></li>
                     
                        <li><a class="action-delete" href="#" data-url="{{route('system.product.destroy',[$new->id])}}" data-toggle="modal" data-target="#confirm-delete" title="Remove Record">Remove Record</a></li>
                      </ul>
                    </div>
                </td>
              </tr>
              @empty
              <td colspan="6" class="text-left"><i>No record found yet.</i> <a href="{{route('system.product.create')}}"><strong>Click here</strong></a> to create one.</td>
              @endforelse
            </tbody>
          </table> -->
          
        </div>
        <!-- <div class="panel-footer">
          <div class="pagination-wrapper text-center">
            {!!$products->render()!!}
          </div>
        </div> -->
      </div>

    </div>
  </div>
</div>
@stop

@section('page-modals')
<div id="confirm-delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h1 class="modal-title">Confirm your action</h1>
      </div>

      <div class="modal-body">
        <div role="alert" class="alert alert-warning alert-icon alert-icon-border alert-dismissible">
          <div class="icon"><span class="mdi mdi-close-circle-o"></span></div>
          <div class="message">
            <strong>Warning!</strong> This action can not be undone.
          </div>
        </div>
        <h3 class="text-semibold">Are you sure ...</h3>
        <p>You are about to delete the record?</strong></p>

        <hr>

        <h3 class="text-semibold">What is this message?</h3>
        <p>This dialog appears everytime when the chosen action could hardly affect the system. Usually, it occurs when the system is issued a delete command or upon submission of your task of the day.</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
        <a href="#" data-loading-text="<i class='icon-spinner2 spinner position-left'></i> Removing record ..." class="btn btn-primary btn-raised btn-loading" id="btn-confirm-delete">Delete Record</a>
      </div>
    </div>
  </div>
</div>
@stop

@section('page-styles')

<style>


input[type="checkbox"][id^="myCheckbox"] {
  display: none;
}

.order_check {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

.order_check:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

.order_check img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + .order_check {
  border-color: #ddd;
}

:checked + .order_check:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
  z-index: 99;
}

:checked + .order_check img {
  transform: scale(0.9);
  /* box-shadow: 0 0 5px #333; */
  z-index: -1;
}
</style>
<link rel="stylesheet" type="text/css" href="{{asset('assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css')}}"/>
@stop
@section('page-scripts')
<script src="{{asset('assets/lib/moment.js/min/moment.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
  $(function(){
    $('.datepicker').datetimepicker({autoclose: true})
    $(".action-delete").on("click",function(){
      var btn = $(this);
      $("#btn-confirm-delete").attr({"href" : btn.data('url')});
    });

    $('#btn-confirm-delete').on('click', function() {
      $('.btn-link').hide();
          $('.btn-loading').button('loading');
          $('#target').submit();
     });

  });
</script>
@stop


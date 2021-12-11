<div class="be-left-sidebar">
    <div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">{{env('APP_NAME',"Ordering Food System")}}</a>
        <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
                <div class="left-sidebar-content">
                    <ul class="sidebar-elements">
                       
                       

                       
                        
                        @if($auth->type == 'user')
                        <li class=""><a href="{{route('system.order_product.index')}}"><i class="icon mdi mdi-face"></i><span>List of Food</span></a>
                            <!-- <ul class="sub-menu">
                                <li><a href="{{route('system.areas.index')}}">All records</a> </li>
                                <li><a href="{{route('system.areas.create')}}">Create New</a> </li>
                            </ul> -->
                        </li>
                        @else
                        <li class="divider">Masterfile</li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Category</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('system.category.index')}}">All records</a> </li>
                                <li><a href="{{route('system.category.create')}}">Create New</a> </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>Product</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('system.product.index')}}">All records</a> </li>
                                <li><a href="{{route('system.product.create')}}">Create New</a> </li>
                            </ul>
                        </li>
                        <li class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span>User Management</span></a>
                            <ul class="sub-menu">
                                <li><a href="{{route('system.user_management.index')}}">All records</a> </li>
                                <!-- <li><a href="{{route('system.product.create')}}">Create New</a> </li> -->
                            </ul>
                        </li>
                        @endif
                     
                       
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">@lang('menuitems.menu')</li>
                @foreach($menuitems as $menuitem)
                @if(empty($menuitem->parent_id))
                <!-- single menu no child menu -->
                @if(!empty($menuitem->route))
                  <li>
                    <a href="{{route($menuitem->route)}}" class="waves-effect">
                       <i class="{{$menuitem->icon}}"></i> 
                        <span key="t-dashboards">@lang($menuitem->language_file_name.'.'.$menuitem->title)</span>
                    </a>
                    
                </li>
                @else
                   <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="{{$menuitem->icon}}"></i>
                       
                        <span key="t-dashboards">@lang($menuitem->language_file_name.'.'.$menuitem->title)</span>
                    </a>
                  <ul class="sub-menu" aria-expanded="false">

                        @foreach($menuitem->childmenu as $childmenu)
                        <li><a href="{{route($childmenu->route)}}" key="t-default"> <i class="{{$childmenu->icon}}"></i> @lang($childmenu->language_file_name.'.'.$childmenu->title)</a></li>
                        @endforeach
                       
                    </ul>
                    
                </li>
                @endif
                 @else
          

                
                @endif
              
                @endforeach
                


               


             

           
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End
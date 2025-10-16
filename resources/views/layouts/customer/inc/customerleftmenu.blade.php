

                  <div class="myaccount-tab-menu nav nav-tabs" id="nav-tab" role="tablist">
                    @foreach($menuitems as $menuitem)
                    <button class="nav-link @if($loop->iteration == 1) active @endif"   data-url="{{route($menuitem->route)}}" data-viewport="customer_main_body" data-class="nav-link"  data-remove-class="active" onclick="customershowview(this)" >@lang($menuitem->language_file_name.'.'.$menuitem->title)</button>
                    @endforeach
                    
                  </div>
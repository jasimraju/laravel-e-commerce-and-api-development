
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        @foreach($sub_menus as $sub_menu)
                                        <a class="nav-link sub-left-menu"  href="javascript:void(0)" role="tab" onclick="showview(this)" data-url="{{$sub_menu['dataurl']}}" {{$sub_menu['callback'] ?? ' '}} data-viewport="{{$sub_menu['view_port']}}">
                                            <i class= "{{$sub_menu['icon']}} d-block check-nav-icon mt-4 mb-2"></i>
                                            <p class="fw-bold mb-4">{{$sub_menu['title']}}</p>
                                        </a>
                                        @endforeach
                                        
                                    </div>
                               
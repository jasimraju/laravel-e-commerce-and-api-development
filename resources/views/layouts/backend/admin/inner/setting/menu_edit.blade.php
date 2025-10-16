  <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel" aria-labelledby="v-pills-gen-ques-tab">
                                                    <h4 class="card-title mb-5">{{$sub_title}}</h4>
                                    <form action="{{route('admin.edit.menu',$menus->id)}}" id="menu-save-form">
                                    	@csrf
                                    	<div class="row">
                                    		<div class="col-md-6">
		                                    <div class="mb-3">
		                                        <label  id="label-title" class="form-label">@lang('label.title')</label>
		                                        <input type="text" id="parent-title" name="title" class="form-control" value="@lang($menus->language_file_name.'.'.$menus->title)">
                                                <input type="hidden"  name="key" class="form-control" value="{{$menus->title}}">
		                                        <div class="error d-none" id="error-title">
		                                        </div>
		                                    </div>
                                    </div>
                                    

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-route"  class="form-label">@lang('label.route')</label>
                                                <input type="text"  name="route" value="{{$menus->route}}" id="parent-route" class="form-control" >
                                                <div class="error d-none" id="error-route">
		                                        </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label  id="label-model_name"  class="form-label">@lang('label.model')</label>
                                                <input type="text" name="model_name" value="{{$menus->model_name ?? ''}}" id="parent-model_name" class="form-control" >
                                                <div class="error d-none" id="error-model_name">
		                                        </div>
                                            </div>
                                        </div>
                                 

                                  
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-icon" class="form-label">@lang('label.icon')</label>
                                                <div id="iconpicker" role="iconpicker"></div>
                                                
                                            
                                                <div class="error d-none" id="error-icon">
		                                        </div>
                                            </div>
                                             

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-parent_id" class="form-label">@lang('label.parent') @lang('menuitems.menu') @lang('label.title')</label>
                                                <select  id="parent-parent_id" name="parent_id" class="form-select">
                                                    <option value=" ">@lang('label.choose')</option>
                                                     @foreach($parent_menu_lists as $parent_menu_list)
                                                    <optgroup label="{{strtoupper($parent_menu_list->name)}}">
                                                	@foreach($parent_menu_list->menu_items as $menu_item)
                                                    <option value="{{$menu_item->id}}" @if($menus->parent_id == $menu_item->id) selected @endif">@lang($menu_item->language_file_name.'.'.$menu_item->title)</option>

                                                    @endforeach
                                                    </optgroup>
                                                   @endforeach
                                                </select>
                                                <div class="error d-none" id="error-parent_id">
		                                        </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-status" class="form-label">@lang('label.status')</label>
                                                <select  id="parent-status" name="status" class="form-select">
                                                    <option value="1" @if($menus->status == 1) selected @endif >@lang('label.active')</option>
                                                    <option value="2" @if($menus->status == 2) selected @endif>@lang('label.inactive')</option>
                                                </select>
                                                <div class="error d-none" id="error-status">
		                                        </div>
                                            </div>
                                        </div>
                                          <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label  id="label-menu_id" class="form-label">@lang('label.menu_type')</label>
                                                <select  id="parent-menu_id" name="menu_id" class="form-select">
                                                	<option value=" " selected >@lang('label.choose')</option>
                                                	@foreach($parent_menu_lists as $parent_menu_list)
                                                    <option value="{{$parent_menu_list->id}}" @if($menus->menu_id == $parent_menu_list->id) selected @endif> {{strtoupper($parent_menu_list->name)}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="error d-none" id="error-menu_id">
		                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="language_file_name" value="menuitems">

                                  
                                    <div>
                                        <button type="button" onclick="formsubmit(this)" id="menu-save" class="btn btn-primary w-md">Submit</button>
                                        <button type="button" class="btn btn-danger w-md">Back</button>
                                    </div>
                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                 
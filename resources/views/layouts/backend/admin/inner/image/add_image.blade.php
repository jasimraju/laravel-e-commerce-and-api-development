       <input type="file" id="{{$image_id_part}}-input" class="d-none" onchange="showimage(this)" />
                                            <div class="col-12 pb-2"><button type="button" onclick="document.getElementById('{{$image_id_part}}-input').click()" class="btn btn-light waves-effect waves-light w-sm">
                                                    <i class="mdi mdi-upload d-block font-size-16"></i> @lang('label.upload')
                                                </button></div>
                                            <div class="col-md-6">
                                                <div class="row">
                                                   
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <img src="" id="{{$image_id_part}}-input-img" alt="" class="rounded avatar-md d-none" >
                                                            <input type="hidden" name="{{$image_id_part}}" id="{{$image_id_part}}-input-value">
                                                            
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
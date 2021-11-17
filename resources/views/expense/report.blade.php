@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Catagorywise</a>
                                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Daily</a>
                                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Month</a>
                                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Yearly</a>
                                </div>
                            </div>
                            <div class="col-lg-9">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <div id="accordion">
                                            @foreach ($all_catagory_names as $catagory)  
                                            <div class="card">
                                              <div class="card-header mb-2" id="headingOne">
                                                <h5 class="mb-0">
                                                  <button class="btn btn-link w-100 d-flex justify-content-between" data-toggle="collapse" data-target="#collapse{{  $catagory->catagory_id }}" aria-expanded="true" aria-controls="collapseOne"
                                                  id="{{ $catagory->catagory_id }}">
                                                    {{ $catagory->relationToCatagory->catagory_name }}

                                                    <span class="text-primary">&dollar; {{ $catagory->sum }}</span>
                                                  </button>
                                                </h5>
                                              </div>
                                          
                                              <div id="collapse{{ $catagory->catagory_id }}" class="collapse hala" aria-labelledby="headingOne" data-parent="#accordion">
                                                <div class="card-body">
                                                  
                                                </div>
                                              </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        ...daily...
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...monthly</div>
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...yearly</div>
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
    <script>
        $(document).ready(function(){
            $('button').on('click',function(){
               var cat_id = $(this).attr('id');
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/expense/catagory/report',
                    type: 'POST',
                    data:{catagory_id:cat_id},
                    success: function(data){
                        $('.hala .card-body').html(data);
                        // alert(data);
                    }
                });
            });
        });
    </script>
@endsection
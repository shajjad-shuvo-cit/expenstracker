@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Expense Add Form </h4>
                        <a href="#">view Expenses</a>
                    </div>
                    <div class="card-body">
                        @if(session('fail'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('fail') }}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('expense.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control"  name="date">
                                  @error('date')
                                      <small class="text-danger">{{ $message }}</small>    
                                  @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Catagory Name</label>
                                <div class="col-sm-8">
                                  <select name="catagory_id" class="custom-select" id="catagory_id">
                                      <option value="">Select A Catagory</option>
                                      @foreach ($catagories as $catagory)
                                        <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                                      @endforeach
                                  </select>
                                  @error('catagory_id')
                                      <small class="text-danger">{{ $message }}</small>    
                                  @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Sub Catagory Name</label>
                                <div class="col-sm-8">
                                    <select type="text" class="custom-select" id="sub_catagory" name="sub_catagory_id">

                                    </select>
                                    @error('sub_catagory_id')
                                        <small class="text-danger">{{ $message }}</small>    
                                    @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Amount</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="amount">
                                  @error('amount')
                                      <small class="text-danger">{{ $message }}</small>    
                                  @enderror
                                </div>
                            </div> 
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Remarks</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="remark"></textarea>
                                    @error('remark')
                                        <small class="text-danger">{{ $message }}</small>    
                                    @enderror
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-success w-100">Submit</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('footer_script')
    <script>
        $(document).ready(function(){
            $('#catagory_id').on('change',function(){
                var cat_id = $(this).val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: '/expense/getsubcatagory',
                    type: 'POST',
                    data: {catagory_id:cat_id},
                    success: function(data){
                        $('#sub_catagory').html(data);
                    }
                });

            });
        });
    </script>
@endsection
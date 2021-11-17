@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Sub Catagory Add Form </h4>
                        <a href="{{ route('subcatagory.index') }}">view Sub Catagory</a>
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
                        <form action="{{ route('subcatagory.store') }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Catagory Name</label>
                                <div class="col-sm-8">
                                    <select class="custom-select" name="catagory_id">
                                        <option>Select Catagory Name</option>
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
                                <label for="staticEmail" class="col-sm-4 col-form-label">Sub Catagory Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" id="staticEmail" name="sub_catagory_name">
                                  @error('sub_catagory_name')
                                      <small class="text-danger">{{ $message }}</small>    
                                  @enderror
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-primary w-100">Submit</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
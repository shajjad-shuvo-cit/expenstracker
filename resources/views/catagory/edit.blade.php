@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">Catagory Edit Form </h4>
                        <a href="{{ route('catagory.index') }}">view catagory</a>
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

                        <form action="{{ route('catagory.update') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Catagory Name</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="id" value="{{ $catagory_info->id }}">
                                  <input type="text" class="form-control" id="staticEmail" name="catagory_name" value="{{ $catagory_info->catagory_name }}">
                                  @error('catagory_name')
                                      <small class="text-danger">{{ $message }}</small>    
                                  @enderror
                                </div>
                            </div> 
                            <button type="submit" class="btn btn-info w-100">Submit</button> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
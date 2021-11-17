@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-capitalize">catagory list</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <th>Sl</th>
                                <th> Catagory Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach ($all_catagories as $catagory)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $catagory->catagory_name }}</td>
                                        <td>
                                            @if ($catagory->status == 1)
                                                <span class="badge badge-sm badge-success text-capitalize">active</span>
                                            @else
                                            <span  class="badge badge-sm badge-danger text-capitalize">De-active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($catagory->status == 1)
                                                <a href="{{ url('/catagory/deactive') }}/{{ $catagory->id }}" class="badge badge-sm bg-danger text-white text-capitalize">make de-active</a>
                                            @else
                                                <a href="{{ url('/catagory/active') }}/{{ $catagory->id }}" class="badge badge-sm bg-success text-white text-capitalize">make active</a>
                                            @endif
                                            <a href="{{ url('/catagory/edit') }}/{{ $catagory->id }}" class="badge badge-sm bg-info text-white text-capitalize">edit</a>
                                            <a href="{{ url('/catagory/delete') }}/{{ $catagory->id }}" class="badge badge-sm bg-dark text-white text-capitalize">delete</a>
                                        </td>
                                        <td>{{ $catagory->created_at->format('d-m-Y D') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
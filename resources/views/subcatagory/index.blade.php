@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-capitalize">sub catagory list</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="thead-dark">
                                <th>Sl</th>
                                <th>Catagory Name</th>
                                <th>Sub Catagory Name</th>
                                <th>Status</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach ($all_sub_catagories as $sub_catagory)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $sub_catagory->relationToCatagory->catagory_name }}</td>
                                        <td>{{ $sub_catagory->sub_catagory_name }}</td>
                                        <td>
                                            @if ($sub_catagory->status == 1)
                                                <span class="badge badge-sm badge-success text-capitalize">active</span>
                                            @else
                                            <span  class="badge badge-sm badge-danger text-capitalize">De-active</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($sub_catagory->status == 1)
                                                <a href="{{ url('/subcatagory/deactive') }}/{{ $sub_catagory->id }}" class="badge badge-sm bg-danger text-white text-capitalize">make de-active</a>
                                            @else
                                                <a href="{{ url('/subcatagory/active') }}/{{ $sub_catagory->id }}" class="badge badge-sm bg-success text-white text-capitalize">make active</a>
                                            @endif
                                            <a href="{{ url('/subcatagory/edit') }}/{{ $sub_catagory->id }}" class="badge badge-sm bg-info text-white text-capitalize">edit</a>
                                            <a href="{{ url('/subcatagory/delete') }}/{{ $sub_catagory->id }}" class="badge badge-sm bg-dark text-white text-capitalize">delete</a>
                                        </td>
                                        <td>{{ $sub_catagory->created_at->format('d-m-Y D') }}</td>
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
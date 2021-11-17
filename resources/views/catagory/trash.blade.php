@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Trashed Catagory Items</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <th>Sl</th>
                                <th> Catagory Name</th>
                                <th>Action</th>
                                <th>Deleted At</th>
                            </thead>
                            <tbody>
                                @foreach ($all_trashed as $trashed)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $trashed->catagory_name }}</td>
                                        <td>
                                            <a href="{{ url('/catagory/restore') }}/{{ $trashed->id }}" class="badge badge-sm bg-success text-white text-capitalize">restore</a>
                                            <a href="{{ url('/catagory/forcedelete') }}/{{ $trashed->id }}" class="badge badge-sm bg-danger text-white text-capitalize">force delete</a>
                                        </td>
                                        <td>{{ $trashed->deleted_at->format('d-m-Y D') }}</td>
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
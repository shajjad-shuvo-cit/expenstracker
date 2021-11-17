@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title text-capitalize">expense list</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped table-responsive">
                            <thead class="thead-dark">
                                <th>Sl</th>
                                <th> Date</th>
                                <th>Catagory Name</th>
                                <th>Sub Catagory Name</th>
                                <th>Amount</th>
                                <th>Remarks</th>
                                <th>Action</th>
                                <th>Created At</th>
                            </thead>
                            <tbody>
                                @foreach ($all_expenses as $expense)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $expense->date }}</td>
                                        <td> {{ $expense->relationToCatagory->catagory_name }}</td>
                                        <td>
                                            @if ($expense->sub_catagory_id == null)
                                                {{ $expense->sub_catagory_id }}
                                            @else
                                                {{ $expense->relationToSubCatagory->sub_catagory_name }}
                                            @endif
                                        </td>
                                        <td>{{ $expense->amount }}</td>
                                        <td>{{ $expense->remark }}</td>
                                        <td>
                                            <a href="{{ url('/expense/edit') }}/{{ $expense->id }}" class="badge badge-sm bg-info text-white text-capitalize">edit</a>
                                            <a href="{{ url('/expense/delete') }}/{{ $expense->id }}" class="badge badge-sm bg-dark text-white text-capitalize">delete</a>
                                        </td>
                                        <td>{{ $expense->created_at->format('d-m-Y D') }}</td>
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
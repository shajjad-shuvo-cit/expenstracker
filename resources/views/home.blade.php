@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="text-success">$10000</span>
                                    <p class="card-text text-capitalize">total Income</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="text-danger"> $ {{ $total_expenses }}</span>
                                    <p class="card-text text-capitalize">total expenses</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <span class="text-info">$ 4000</span>
                                    <p class="card-text text-capitalize">balance</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <div class="card mt-3">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                            @foreach ($recent_expneses as $expense)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $expense->date }}</td>
                                                    <td>$ {{ $expense->amount }}</td>
                                                    <td>{{ $expense->relationToCatagory->catagory_name }}</td>
                                                </tr>    
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <p class="card-text text-capitalize">last 5 transactions</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <div class="card mt-3">
                                <div class="card-body">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

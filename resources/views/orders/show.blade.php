@extends('home')

@section('blade')

<div class="container">
    <div class="card mt-2">
        <div class="card-body table-responsive p-0">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Order Tracker</div>

                    <div class="panel-body">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                        @endif

                        <order-progress status="{{ $order->status->name}}" initial="{{ $order->status->percent }}" order_id="{{ $order->id }}"></order-progress>

                        <order-alert user_id="{{ auth()->user()->id }}"></order-alert>


                        <div class="order-details">
                            <strong>Order ID:</strong> {{ $order->id }} <br>
                            <strong>Size:</strong> {{ $order->size }} <br>
                            <strong>Toppings:</strong> {{ $order->toppings }} <br>

                            @if ($order->instructions != '')
                            <strong>Instructions:</strong> {{ $order->instructions }}
                            @endif

                        </div>

                        <div class="form-group">
                            <a class="btn btn-primary" href="{{ route('user.orders') }}">Back to Orders</a>
                        </div>


                    </div> <!-- end panel-body -->
                </div> <!-- end panel -->
            </div>
        </div>
    </div>
</div>
@endsection

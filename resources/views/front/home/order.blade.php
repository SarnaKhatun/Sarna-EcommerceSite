@extends('front.master')
@section('title')
    Order show
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-capitalize text-center">show order</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Sl. No:</th>
                                    <th>Product Title</th>
                                    <th>Product Quantity</th>
                                    <th>Product Price</th>
                                    <th>Payment Status</th>
                                    <th>Delivery Status</th>
                                    <th>Image</th>
                                    <th>Cancel Order</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->title}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->price}}</td>
                                        <td>{{$order->payment_status}}</td>
                                        <td>{{$order->delivery_status}}</td>
                                        <td><img src="{{asset($order->image)}}" alt="" style="height: 100px; width: 100px;"></td>
                                        <td>
                                            @if($order->delivery_status == 'Processing')
                                            <a href="{{route('cancel.order', $order->id)}}" class="btn btn-danger" onclick="return confirm('are you sure???')">Cancel Order</a>
                                            @else
                                                <p class="text-capitalize text-center" style="color: navy">not allowed</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

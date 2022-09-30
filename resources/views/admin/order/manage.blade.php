@extends('admin.master')
@section('title')
    Manage Order
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">all orders</h4>
                            <div class="text-dark" style="padding-bottom: 30px; padding-left: 400px; margin-top: 10px;">
                                <form action="{{route('search')}}" method="post">
                                    @csrf
                                    <input type="text" name="search" placeholder="Search for something">
                                    <input type="submit" value="search" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table-responsive table table-bordered">
                                <thead>
                                <tr>
                                    <th>Sl. No:</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Product Title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Payment status</th>
                                    <th>Delivery status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->phone}}</td>
                                        <td>{{$order->title}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->price}}</td>
                                        <td><img src="{{asset($order->image)}}" alt="" style="height: 100px; width: 100px; "></td>
                                        <td>{{$order->payment_status}}</td>
                                        <td>{{$order->delivery_status}}</td>
                                        <td>
                                            <a href="{{route('delivered', ['id' => $order->id])}}" onclick="return confirm('Are you sure????')" class="btn btn-{{$order->delivery_status == 'Processing' ? 'warning' : 'success'}} {{$order->delivery_status == 'Delivered' ? 'disabled' : ''}}">{{$order->delivery_status == 'Processing' ? 'Not Delivered' : 'Delivered'}}</a>
                                            <a href="{{route('print.pdf', ['id' => $order->id])}}" class="btn btn-info">Print PDF</a>
                                            <a href="{{route('send.email', ['id' => $order->id])}}" class="btn btn-primary">Send Email</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="16">
                                          No data found  
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

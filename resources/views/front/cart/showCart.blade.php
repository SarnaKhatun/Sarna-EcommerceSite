@extends('front.master')
@section('title')
    Show Cart
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">show cart</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>Sl. No:</th>
                                    <th>Orederer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Name</th>
                                    <th>Product Image</th>
                                    <th>Product Price</th>
                                    <th>Product Quantity</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $totalPrice = 0; ?>
                                @foreach($carts as $cart)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$cart->name}}</td>
                                        <td>{{$cart->phone}}</td>
                                        <td>{{$cart->address}}
                                        </td><td>{{$cart->title}}</td>
                                        <td><img src="{{asset($cart->image)}}" alt="" style="height: 100px; width: 100px;"></td>
                                        <td>{{$cart->price}}</td>
                                        <td>{{$cart->quantity}}</td>
                                        <td>
                                            <a href="{{route('remove-cart', ['id' => $cart->id])}}" class="btn btn-danger" onclick="deleteCart({{$cart->id}})">Remove Product</a>
                                            <form action="{{route('remove-cart', ['id' => $cart->id])}}" method="post" id="deleteTo{{$cart->id}}">
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $totalPrice = $totalPrice + $cart->price?>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center font-weight-bolder" style="font-size: 20px; padding: 40px;">
                              Total Price: {{ $totalPrice}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center">
        <h1 class="text-capitalize fw-bold mb-1" style="font-size: 20px;">proceed to order</h1>
        <a href="{{route('cash-order')}}" class="btn btn-danger mr-1">Cash on Delivery</a>
        <a href="{{route('stripe', $totalPrice)}}" class="btn btn-danger ml-1">Pay Using Card</a>
    </div>
    <script>
        function deleteCart(id) {
            event.preventDefault();
            var cart = confirm('Are you sure???');
            if (cart)
            {
                document.getElementById('deleteTo'+id).submit();
            }
        }
    </script>
@endsection

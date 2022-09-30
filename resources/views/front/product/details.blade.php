@extends('front.master')

@section('title')
{{$product->title}}
@endsection

@section('body')
    <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px;">
        <div class="box">
            <div class="img-box" style="padding: 20px;">
                <img src="{{asset($product->image)}}" alt="" style="height: 350px; width: 350px;">
            </div>
            <div class="detail-box">
                <h5>{{$product->title}}</h5>
                @if($product->dis_price != null)
                    <h6 style="color: red"> Discount Price <br/> ${{$product->dis_price}}</h6>
                    <h6 style="color: blue; text-decoration: line-through"> Price <br/> ${{$product->price}}</h6>
                @else
                    <h6 style="color: blue"> Price <br/> ${{$product->price}}</h6>
                @endif

                <h6>Product Category: {{$product->category->category_name}}</h6>
                <h6>Product details: {{$product->description}}</h6>
                <h6>Available Quantity: {{$product->quantity}}</h6>
                <div class="row mt-3 ml-1">
                    <form action="{{route('add-cart', ['id' => $product->id])}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                            </div>
                            <div class="col-md-4">
                                <input type="submit" value="Add to cart">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


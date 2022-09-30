<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <br/>
            <br/>
            <div>
                <form action="{{route('product.search')}}" method="post">
                    @csrf
                    <input type="text" name="search" placeholder="Search for something">
                    <input type="submit" value="search">
                </form>
            </div>
        </div>
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{route('product-details', ['id' => $product->id])}}" class="option1">
                                Product Details
                            </a>
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
                    <div class="img-box">
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

                    </div>
                </div>
            </div>
            @endforeach

            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
{{--            {{$products->withQueryString()->links('pagination::bootstrap-5')}}--}}
{{--            {!! $products->appends(Request::all())->links() !!}--}}

        </div>
    </div>
</section>

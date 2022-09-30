@extends('admin.master')

@section('title')
    Manage Product
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">manage product</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>Sl. No:</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->category->category_name}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->description}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->dis_price}}</td>
                                        <td>{{$product->quantity}}</td>
                                        <td><img src="{{$product->image}}" alt="" style="height: 90px; width: 50px;"></td>
                                        <td>
                                            <a href="{{route('edit-product', ['id' => $product->id])}}" class="btn btn-secondary fa fa-edit"></a>
                                            <a href="{{route('delete-product', ['id' => $product->id])}}" class="btn btn-danger" onclick="deleteProduct({{$product->id}})"><i class="fa fa-trash"></i></a>
                                            <form action="{{{route('delete-product', ['id' => $product->id])}}}" method="post" id="deleteTo{{$product->id}}">
                                                @csrf
                                            </form>
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
    <script>
        function deleteProduct(id) {
            event.preventDefault();
            var product = confirm('Are you sure???');
            if (product)
            {
                document.getElementById('deleteTo'+id).submit();
            }
        }
    </script>
@endsection

@extends('admin.master')
@section('title')
    Edit Category
@endsection

@section('body')
    <section class="py-2"></section>
    <div class="row">
        <div class="col-md-7 mx-auto">
            <div class="card">
                <div class="card-header">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <h4 class="text-center text-capitalize">edit category</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('update-category', ['id' => $category->id])}}" method="post">
                        @csrf
                        <input class="text-dark" type="text" name="category_name" value="{{$category->category_name}}" placeholder="Write category name">
                        <input type="submit" class="btn btn-outline-primary text-white" value="Update Category">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <section class="py-5"></section>
    <section class="py-5"></section>
    <section class="py-5"></section>
    <section class="py-5"></section>

@endsection



@extends('admin.master')
@section('title')
    Send Email
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-capitalize text-center">send mail to {{$order->email}}</h3>
                        </div>
                        <div class="card-body bg-info text-dark">
                            <form action="{{route('send.user.email', ['id' => $order->id])}}" method="post">
                                @csrf
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email Greetings:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="greeting">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email First Line:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="firstline">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email Body:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="body">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email Button Name:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="button">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email Url:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="url">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4">Email Last Line:</label>
                                        <div class="col-md-8">
                                            <input type="text" name="lastline">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <label for="" class="col-md-4"></label>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-success" value="Send Email">
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

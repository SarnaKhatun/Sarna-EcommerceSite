@extends('front.master')

@section('title')
    Home Page
@endsection

@section('body')
    @include('sweetalert::alert')

    <!-- slider section -->
    @include('front.includes.slider')
    <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('front.includes.why')
    <!-- end why section -->

    <!-- arrival section -->
    @include('front.includes.new_arrival')
    <!-- end arrival section -->

    <!-- product section -->
    @include('front.includes.product')
    <!-- end product section -->


    <!--comments & reply system starts here-->
    <section class="py-5 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-capitalize">comments</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{route('add.comment')}}" method="post">
                                @csrf
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <textarea name="comment" id="" cols="30" rows="10" placeholder="Comment something here..." class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label class="col-md-2"></label>
                                    <div class="col-md-10">
                                        <input type="submit" class="btn btn-primary" value="Comment">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-capitalize text-center font-weight-bolder">all comments</h2>
                </div>
               <div class="row mt-5">
                   @foreach($comments as $comment)
                   <div class="col-md-9">
                       <b>{{$comment->name}}</b>
                       <p>{{$comment->comment}}</p>
                       <a style="color: red;" href="javascript:void(0);" onclick="reply(this)" data-commentId="{{$comment->id}}">Reply</a>

                       @foreach($replies as $reply)
                           @if($reply->comment_id == $comment->id)
                       <div style="padding-left: 8%; padding-bottom: 10px;">
                           <b>{{$reply->name}}</b>
                           <p>{{$reply->reply}}</p>
                           <a style="color: blue;" href="javascript:void(0);" onclick="reply(this)" data-commentId="{{$comment->id}}">Reply</a>

                       </div>
                           @endif
                       @endforeach
                   </div>
                  @endforeach


                   <!--Reply textbook-->

                   <div class="replyDiv" style="display: none">
                       <form action="{{route('add.reply')}}" method="post">
                           @csrf
                           <input type="text" name="commentId" id="commentId" hidden>
                           <textarea name="reply" placeholder="write something here" id="" cols="30" rows="10"></textarea>
                           <br/>
                           <button type="submit" class="btn btn-warning">Reply</button>
                           <a href="javascript:void(0);" class="btn btn-secondary" onclick="reply_close(this)">Close</a>
                       </form>
                      </div>
               </div>
            </div>
        </div>

    </section>
    <!--comments & reply system end here-->


    <!-- subscribe section -->
    @include('front.includes.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('front.includes.client')
    <!-- end client section -->
@endsection

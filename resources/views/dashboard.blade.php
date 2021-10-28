@extends('layouts.master')

@section('content')

@include('includes.message-block')


<section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="{{ route('post.create') }}" >
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5" placeholder="Your Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>
        </div>
</section>

    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            @if (session()->has('addfr'))
                <p class="alert alert-success">
                    {{session()->get('addfr')}}
                    <script >
                        function changeVlaueA() {
                            document.getElementById("AddF").innerHTML = "Sent !";
                        }
                    </script>
                </p>
            @endif
            @if (session()->has('delfr'))
                <p class="alert alert-danger">
                    {{session()->get('delfr')}}
                    <script >
                        function changeVlaueD() {
                            document.getElementById("DelF").innerHTML = "Deleted !";
                        }
                    </script>
                </p>
            @endif
            <header><h3>What other people say...</h3></header>

            @foreach($posts as $post)
                <article class="post" data-postid="{{ $post->id }}">
                    <p>
                    {{$post->body}}
                    </p>
                    <div class="info">
                        posted by {{$post->user->name}} on {{$post->created_at}}
                        @if(!(Auth::user() == $post->user))
                        <a id="AddF" href="{{route('add.friend',['id' =>$post->user_id] )}}" style="padding-left: 10ex" onclick="#changetxtAdd">Send Req.</a>
                        <a id="DelF" href="{{route('del.friend',['id' =>$post->user_id] )}}" style="padding-left: 3ex;" onclick="#changetxtDel">Delete Req.</a>

                        <script id="changetxtAdd">
                            changeVlaueA();
                        </script>
                        <script id="changetxtDel">
                            changeVlaueD();
                        </script>
                        @endif
                    </div>

                    <div class="interaction">
                        {{-- <a href="#">Comment</a> --}}


                        @if(Auth::user() == $post->user)

                        <a href="#" class="edit">Edit</a>|
                        <a href="{{route('post.delete', ['post_id'=>$post->id] )}}">Delete</a>

                        @endif
                        <br>
                            <form action="{{ route('add.comment',['post_id'=>$post->id]) }}" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="Commbody" id="new-comment" rows="1" placeholder="Comment..."></textarea>
                                </div>
                                    <button type="submit" class="btn btn-primary">Comment</button>
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                            @foreach ($comments as $comment)
                                    <article class="comment" data-commentId="{{ $comment->id }}">
                                        <p>
                                        {{$comment->Commbody}}
                                        </p>
                                        <div class="info">
                                            comment by {{$comment->post->user->name}} on {{$comment->created_at}}
                                        </div>
                                    </article>
                                    @endforeach

                    </div>

                </article>


            @endforeach


        </div>
    </section>

    <div class="modal fade" tabindex="-1" role="dialog" id='edit-modal'>
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
      <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>

    var token ='{{ Session::token() }}';
    var url='{{ route('edit') }}';
</script>



@endsection

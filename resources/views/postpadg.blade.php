
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h2>{{ $post->title }}</h2></div>
                    <div class="card-body">
                        <div class="card">
                            @if ($post->image)
                            <img src="{{ asset('images/' . $post->image) }}" alt="Post Image">
                        @endif
                        <p class="card-text"><h5>{{ $post->content }}</h5></p>
                        <hr>
                        <h2>اضف تعليق</h2>
                    </div>


<!-- Comment Form -->

<form action="{{ route('comments.store') }}" method="POST">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post->id }}">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="phone">phone</label>
        <input type="integer" name="phone" id="phone" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea name="comment" id="comment" class="form-control" rows="4" value="$comment" required></textarea>
    </div>
     <!-- Display suggested comments -->
     @if ($suggestedComments)
     <div class="suggested-comments">
         <h4>Suggested Comments:</h4>
         @foreach ($suggestedComments as $comment)
             <a href="" class="suggested-comment" data-comment="{{ $comment }}">{{ $comment }}</a><br>
         @endforeach
     </div>
 @endif

   <!-- JavaScript code -->
   <script>
       $(document).ready(function() {
           $(".suggested-comment").click(function() {
               console.log("Suggested comment clicked!");
               var comment = $(this).data('comment');
               $("#content").val(comment);
           });
       });
   </script>

        {{--          --}}

    <button type="submit" class="btn btn-primary">Submit Comment</button>
</form>

@if ($post->comments->count() > 0)
    <h2>Comments:</h2>
    @foreach ($post->comments as $comment)
        <div class="comment">
            <h4>{{ $comment->name }}</h4>
            <p>{{ $comment->comment }}</p>
        </div>
    @endforeach
@else
    <p>No comments yet.</p>
@endif



                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.suggested-comment').on('click', function(e) {
                e.preventDefault();
                var comment = $(this).data('comment');
                $('#comment').val(comment);
            });
        });
    </script>

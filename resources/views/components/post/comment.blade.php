<div class="row row-flex">
    <div class="col-md-1 pl-5 pr-0">
        <div class="text-center ">
            <a  onclick="upCommentVote({{$comment->id}},{{auth()->user()->id}})"><i   class="fa fa-caret-up fa-lg  mb-n3"  style="color: #707070"></i></a>
            <p class="mt-n2" id="{{$comment->id.$comment->id}}" style="margin-bottom:0px!important;padding-bottom: 0px!important;">
                @if(is_countable($comment->upvotes) && !is_countable($comment->downvotes))
                    {{count($comment->upvotes)}}
                @else
                    @if(!is_countable($comment->upvotes) && is_countable($comment->downvotes))
                        {{count($comment->downvotes)}}
                    @else
                        @if(!is_countable($comment->upvotes) && !is_countable($comment->downvotes))
                           {{0}}
                        @else
                            {{count($comment->upvotes) - count($comment->downvotes)}}
                        @endif
                    @endif
                @endif
            </p>
            <a  onclick="downCommentVote({{$comment->id}},{{auth()->user()->id}})"><i   class="fa fa-caret-down fa-lg mt-n3"  style="color: #707070"></i></a>
        </div>
        <div class="text-center ml-1" style="border-left: 1px solid;min-height: 50%;" >
        </div>
    </div>
    <div class=" col-md-9 pl-3" id="{{$comment->user->picture.$comment->id}}">
        <div class="d-flex align-items-center pt-2" >
            <img class="mt-1 mr-1 shadow" src="{{$comment->user->picture}}" style="height: 30px;width: 30px;border-radius: 50%">
            <p class="mr-1" style="font-size: 14px">{{$comment->user->name}}</p>
{{--            <p  style="font-size: 13px; color: #c4c2bd;">4 hours ago</p>--}}
        </div>
        <div>
            <p class="mb-1" style="color: #707070;font-size: 14px;">{!! $comment->content !!}</p>

        </div>
        <div class="d-flex mb-2">
            <a class="text-secondary mr-2"   ><i class="fa fa-commenting mr-1"></i>{{ count($comment->replies).' Replies' }}</a>
            <a class="text-secondary mr-2"   onclick="reply({{$comment}})"><i class="fa fa-commenting mr-1"></i>{{ ' Add Reply' }}</a>
        </div>
        <hr class="mt-1 mb-1">
        @foreach($comment->replies as $reply)
            <x-post.reply :reply="$reply"></x-post.reply>
            <hr class="mt-1 mb-1">
        @endforeach

    </div>
    @if($post->solved == false && auth()->user()->id == $post->createdBy->id)
   <div class="col-md-1">
       <a class="text-secondary" onclick="AcceptComment({{$post->id}},{{$comment->id}})"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></a>
   </div>
    @endif
    <div class="col-md-2">
        <div class="row ">
    @if($comment->accepted == true)

            <a class="text-primary" ><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></a>


    @endif
    @if(auth()->user()->id == $comment->user_id)



                 <a class="ml-2"  type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-sliders"  style="color: #707070"></i>
                 </a>
                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     <a class="dropdown-item text-secondary"  data-toggle="modal" data-target="#commentModal{{$comment->id}}" ><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> Edit Comment</a>
                     <a class="dropdown-item text-secondary" onclick="commentDelete({{$comment->id}})"><i class="fa fa-trash-o mr-2" aria-hidden="true"></i> Delete Comment</a>
                 </div>


    @endif
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="commentModal{{$comment->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row justify-content-center">
                    <p class="h3 text-secondary ">Edit Comment </p>
                </div>


                <form action="{{route('Update comment',['id'=>$comment->id])}}" method="POST">
                    @csrf
                <div class="mt-2 pl-4 pt-2 pb-2">
                    <textarea class="form-control  @error('comment') is-invalid @enderror" id="comment-editor-text" name="comment" >{!! $comment->content !!}</textarea>
                    @error('comment')
                    <span class="invalid-feedback" role="alert">
                                               <strong>{{ $message }}</strong>
                                             </span>
                    @enderror
                    <div class="row justify-content-end">
                        <div class="col-md-3">
                            <button type="submit"  class="nav-link text-white btn btn-primary btn-sm mt-3 mr-3 d-flex" id="comment-button" ><div id="spinner-border" class="spinner-border text-secondary  spinner-border-sm" role="status" style="display: none">
                                    <span class="sr-only">Loading...</span>
                                </div> <p class="ml-2">{{ __('Edit comment') }}</p> </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: '#comment-editor-text',
        plugins: 'a11ycheckerlists   table ',
        // toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name'
    });
</script>

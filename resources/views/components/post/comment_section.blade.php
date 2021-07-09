<div class="row row-flex">
    <div class="col-md-1 pl-5 pr-0">
        <div class="text-center ">
            <a  onclick="upCommentVote({{$comment->id}},{{auth()->user()->id}})"><i   class="fa fa-caret-up   mb-n3"  style="color: #707070"></i></a>
            <p class="mt-n2" id="{{$comment->id.$comment->id}}" style="margin-bottom:0px!important;padding-bottom: 0px!important;">
                0
            </p>
            <a  onclick="downCommentVote({{$comment->id}},{{auth()->user()->id}})"><i   class="fa fa-caret-down  mt-n3"  style="color: #707070"></i></a>
        </div>
        <div class="text-center ml-1" style="border-left: 1px solid;min-height: 50%;" >
        </div>
    </div>
    <div class=" col-md-10 pl-3" id="{{$comment->user->picture.$comment->id}}">
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
            <a class="text-secondary mr-2" href="#" ><i class="fa fa-exclamation-triangle mr-1"></i>{{ __('Report') }}</a>
        </div>
        <hr class="mt-1 mb-1">


    </div>
    @if($post->solved == false && auth()->user()->id == $post->createdBy->id)
        <div class="col-md-1">
            <a class="text-secondary" onclick="AcceptComment({{$post->id}},{{$comment->id}})"><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></a>
        </div>
    @endif
    @if($comment->accepted == true)
        <div class="col-md-1">
            <a class="text-primary" ><i class="fa fa-thumbs-up fa-lg" aria-hidden="true"></i></a>
        </div>
    @endif
</div>

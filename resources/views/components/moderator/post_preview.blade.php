<div class="mt-3 row " >
    <div class="col-md-10 ml-5 Post shadow pl-0 d-flex justify-content-between align-items-center rounded-lg" style="background: #fff">
        <div class="row row-flex w-100 pl-3">
            <div class=" col-md-1 pl-0 pr-0"  style="border-left: 5px solid #17756D !important; border-top-left-radius: 5px;border-bottom-left-radius:5px;background: #e0eceb; color: #707070;background-size: cover;">
                <div class="text-center ">
                    @if(Request::route()->getName() != 'Home' )
                        <a onclick="upVote({{$post->id}},{{auth()->user()->id}})">  <i   class="fa fa-caret-up fa-2x  mb-n3"  style="color: #707070" ></i></a>
                        <p class="mt-n2" style="margin-bottom:0px!important;padding-bottom: 0px!important;" id="{{$post->id}}">{{$post->upvotes_count - $post->downvotes_count}}</p>
                        <a onclick="downVote({{$post->id}},{{auth()->user()->id}})" > <i   class="fa fa-caret-down fa-2x mt-n3"  style="color: #707070"  ></i></a>
                    @else
                        <a onclick="upVote({{$post->id}},{{auth()->user()->id}})">  <i   class="fa fa-caret-up fa-2x  mb-n3"  style="color: #707070" ></i></a>
                        <p class="mt-n2" style="margin-bottom:0px!important;padding-bottom: 0px!important;" id="{{$post->id}}">{{count($post->upvotes) - count($post->downvotes)}}</p>
                        <a onclick="downVote({{$post->id}},{{auth()->user()->id}})" > <i   class="fa fa-caret-down fa-2x mt-n3"  style="color: #707070"  ></i></a>
                    @endif
                </div>
            </div>
            <div class=" col-md-11 pt-3 pb-1">
                <div class="container">

                    <div class="d-flex align-items-center" >
                        <img class="mt-n3 mr-1 shadow" src="{{$post->community->picture}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <a class="mr-1 " style="text-decoration: none;color:#000;" href="{{route('community',['id'=>$post->community->id])}}">{{$post->community->name}}</a>
                        <p  style="font-size: 13px; color: #c4c2bd;">posted by {{$post->createdBy->name}} on {{$post->created_at->format('d M Y')}} at {{$post->created_at->format('H:m')}}</p>
                    </div>
                    <div>
                        <p class="h5">{{$post->title}}</p>
                        <a class="nav-link text-secondary mb-2" style="text-decoration: none;" href="{{route('question',['id'=>$post->id])}}">{{ __('Show more') }}</a>
                        @if(Request::route()->getName() == 'Reported posts')
                            <a class="nav-link text-secondary" style="text-decoration: none;" href="#" onclick="whyReported({{$post->reported_posts}})"> Why reported ?</a>
                            @endif
                    </div>
                    <div class="d-flex">
                        <button class=" text-primary btn btn-success  btn-sm ml-2">
                            Javascript
                        </button>
                        <button class=" text-primary btn btn-success  btn-sm ml-2">
                            Jquery
                        </button>
                        <button class=" text-primary btn btn-success  btn-sm ml-2">
                            VueJS
                        </button>
                        <button class=" text-primary btn btn-success  btn-sm ml-2">
                            FrontEnd
                        </button>
                    </div>
                    @if(Request::route()->getName() != 'Archive posts')
                    <div class="d-flex mt-3 mb-2">
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-commenting mr-1"></i>{{$post->comments->reduce(function ($count, $comment) {return $count + $comment->replies->count() +1;}, 0).' Answers' }}</a>
                        <a class="text-secondary  mr-2" onclick="savePost({{$post->id}})" href="#" ><i class="fa fa-bookmark mr-1"></i>{{ __('Save') }}</a>
                        <a class="text-secondary mr-2" onclick="reportPost({{$post->id}})" href="#" ><i class="fa fa-exclamation-triangle mr-1"></i>{{ __('Report') }}</a>
                    </div>
                    <div class="d-flex justify-content-end mb-2" >
                        <button class="btn btn-danger btn-sm" onclick="postDelete({{$post->id}})">Delete</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

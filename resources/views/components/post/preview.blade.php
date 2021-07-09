
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
            <div class=" col-md-11 pt-3">
                <div class="container">
                    @if(auth()->user()->id == $post->createdBy->id)
                    <div class="row justify-content-end">

                        <a  type="text" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-sliders"  style="color: #707070"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-secondary" href="{{route('Edit post',['id'=>$post->id])}}"><i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> Edit Post</a>
                            <a class="dropdown-item text-secondary" onclick="previewPostDelete({{$post->id}})"><i class="fa fa-trash-o mr-2" aria-hidden="true"></i> Delete Post</a>
                        </div>
                        @if($post->element_id)
                            <a class="text-secondary ml-2" href="{{route('Post Lesson',['post_id'=>$post->id,'lesson_id'=>$community->lesson_id])}}" data-toggle="tooltip" data-placement="top" title="Go to lesson"><i class="fa fa-lightbulb-o fa-lg" aria-hidden="true"></i></a>
                        @endif
                    </div>
                    @endif
                    <div class="d-flex align-items-center mb-2" >
                        <img class="mt-n3 mr-1 shadow" src="{{$community->picture}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <a class="mr-1 " style="text-decoration: none;color:#000;font-size:17px;" href="{{route('community',['id'=>$community->id])}}">{{$community->name}}</a>
                        <p  style="font-size: 13px; color: #c4c2bd;">posted by {{$post->createdBy->name}} on {{$post->created_at->format('d M Y')}} at {{$post->created_at->format('H:m')}}</p>
                    </div>
                    <div>
                        <p class="h5">{{$post->title}}</p>
                        <div class="limited-para" style="color: #707070;">{!! $post->content !!}</div>
                        @if($post->medias)
                            <div  id="carouselExampleIndicators.{{$post->id}}" class="carousel slide pb-5" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($post->medias as $key=>$media)

                                        <div class="carousel-item pl-5 text-center @if($key == 0) active @endif">

                                            <div class="ml-2 pl-5 mb-2 nw_mg">
                                                <img class="fullsize" style="width:280px;height:220px;"  src="{{asset($post->medias[$key]->link)}}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if(count($post->medias) >1)
                                <a class="carousel-control-prev" href="#carouselExampleIndicators.{{$post->id}}" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon " aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next text-default" href="#carouselExampleIndicators.{{$post->id}}" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                                @endif
                            </div>
                        @endif
                        <a class="nav-link text-secondary mb-2" style="text-decoration: none;" href="{{route('question',['id'=>$post->id])}}">{{ __('Show comments') }}</a>
                    </div>
                    <div class="d-flex">
                        @foreach($post->post_tags as $tag)
                            <a class=" text-primary btn btn-success  btn-sm ml-2" href="{{route('Tag posts',['id'=>$tag->id])}}">
                                {{$tag->name}}
                            </a>
                        @endforeach
                    </div>
                    <div class="d-flex mt-3 mb-2">
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-commenting mr-1"></i>{{$post->comments->reduce(function ($count, $comment) {return $count + $comment->replies->count() +1;}, 0).' Answers' }}</a>
                        <a class="text-secondary  mr-2" onclick="savePost({{$post->id}})" href="#" ><i class="fa fa-bookmark mr-1"></i>{{ __('Save') }}</a>
                        <a class="text-secondary mr-2" onclick="reportPost({{$post->id}},{{auth()->user()->id}})" href="#" ><i class="fa fa-exclamation-triangle mr-1"></i>{{ __('Report') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<div class="mt-3 row " >
    <div class="col-md-10  Post shadow pl-0 d-flex justify-content-between align-items-center rounded-lg" style="background: #fff">
        <div class="row row-flex w-100 pl-3">
            <div class=" col-md-1 pl-0 pr-0"  style="border-left: 5px solid #17756D !important; border-top-left-radius: 5px;border-bottom-left-radius:5px;background: #e0eceb; color: #707070;background-size: cover;">
                <div class="text-center ">
                    <i   class="fa fa-caret-up fa-2x  mb-n3"  style="color: #707070"></i>
                    <p class="mt-n2" style="margin-bottom:0px!important;padding-bottom: 0px!important;">{{$post->upvotes_count - $post->downvotes_count}}</p>
                    <i   class="fa fa-caret-down fa-2x mt-n3"  style="color: #707070"></i>
                </div>

            </div>
            <div class=" col-md-11 pt-3">
                <div class="container">

                    <div class="d-flex align-items-center" >
                        <img class="mt-n3 mr-1 shadow" src="{{$community->picture}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <p class="mr-1">{{$community->name}}</p>
                        <p  style="font-size: 13px; color: #c4c2bd;">posted by {{$post->createdBy->name}} 4 hours ago</p>
                    </div>
                    <div>
                        <p class="h5">{{$post->title}}</p>
                        <div class="limited-para" style="color: #707070;">{!! $post->content !!}</div>
                        <a class="nav-link text-secondary mb-2" style="text-decoration: none;" data-toggle="modal" data-target="#ModalFullPost">{{ __('Show more') }}</a>
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
                    <div class="d-flex mt-3 mb-2">
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-commenting mr-1"></i>{{ __('1 Answers') }}</a>
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-bookmark mr-1"></i>{{ __('Save') }}</a>
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-share mr-1"></i>{{ __('Share') }}</a>
                        <a class="text-secondary mr-2" href="#" ><i class="fa fa-exclamation-triangle mr-1"></i>{{ __('Report') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-post.post_modal :post="$post" :community="$community"  :members="$members" :joined="$joined" :creator="$creator" :moderators="$moderators"></x-post.post_modal>
</div>

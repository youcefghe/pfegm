<div class="mt-3 row " >
    <div class="col-md-10 ml-5 Post shadow pl-0 d-flex justify-content-between align-items-center rounded-lg" style="background: #fff">
        <div class="row row-flex w-100 pl-3">
            <div class=" col-md-11 pt-3 pl-0 pr-0" style="border-left: 5px solid #17756D !important; border-top-left-radius: 5px;border-bottom-left-radius:5px; background-size: cover;">
                <div class="container">
                    <p class="h5"><strong> {{$message->subject}}</strong></p>
                    <div class="d-flex align-items-center" >
                        <p>From </p>
                        <a class="ml-1 mr-1 " style="text-decoration: none;color:#000;" href="">{{$message->sender['sender']}}</a>
                        <p  style="font-size: 13px; color: #c4c2bd;">on {{$message->created_at->format('d M Y')}} at {{$message->created_at->format('H:m')}}</p>
                    </div>
                    <div>
                        <div  style="color: #707070;">{!! $message->content !!}</div>
                    </div>
                    <div class="d-flex mt-3 mb-2">
                        <a class="text-secondary  mr-2" href="#" data-toggle="modal" data-target="#newMessageReply{{$message->id}}" ><i class="fa fa-bookmark mr-1"></i>{{ __('Reply') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <x-user.reply_message :fromId="$message" :id="$message->id"></x-user.reply_message>
</div>


@foreach($messages as $message)
    <li class="notification-box "  @if(!$loop->last) style="border-bottom: 1px solid ;"@endif">
        <div class="row justify-content-center">
            <div class="p-0 col-2 text-center align-items-center">

                <img src="{{$message->sender['picture']}}"  class="w-50 rounded-circle">
            </div>
            <div class="col-8 p-0">
                <strong class="text-primary">{{$message->sender['sender']}}}</strong>
                <div>
                    <a class="text-secondary" style="text-decoration: none;" href="/messages" onclick="markAsRead({{$message->id}})">
                        {{$message->subject}}
                    </a>
                </div>
                <small class="text-secondary">On {{$message->created_at->format('d M Y')}} at {{$message->created_at->format('H:m')}}</small>
            </div>
        </div>
    </li>

@endforeach


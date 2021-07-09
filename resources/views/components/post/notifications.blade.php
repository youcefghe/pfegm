@foreach ($notifications as $notification)

    <li class="notification-box " @if(!$loop->last) style="border-bottom: 1px solid ;"@endif>
        <div class="row justify-content-center">
            <div class="p-0 col-2 text-center align-items-center">

                <img src="{{json_decode($notification->data)->picture}}"  class="w-50 rounded-circle">
            </div>
            <div class="col-8 p-0">
                <div>
                    <a class="text-secondary" style="text-decoration: none;" href="#" onclick="markAsRead({{$notification->id}})">
                        {{json_decode($notification->data)->message}}
                    </a>
                </div>
                <small class="text-secondary">On {{$notification->created_at->format('d M Y')}} at {{$notification->created_at->format('H:m')}}</small>
            </div>
        </div>
    </li>


@endforeach

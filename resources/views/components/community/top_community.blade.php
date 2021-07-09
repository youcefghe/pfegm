<div class="card shadow rounded-lg" style="width: 20rem;">
    <div class="card-header userDashCom text-center" >
        <p class="h5" style="color: white;">Top Communities</p>
    </div>
    <div class="card-body">
        <div class="container">
            @foreach($topFive as $key => $oneOfFive)
                <div class="row mb-1" style="border-bottom: 1px solid #bdbdbd" >
                    <div class="d-flex justify-content-center" >
                        <p >{{$key + 1 }}. </p>
                        <img class="mt-n1 ml-1 mb-2" src="{{asset($oneOfFive->picture)}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <a class="ml-1 mt-1 text-secondary" style="text-decoration: none" href="{{route('community',['id'=>$oneOfFive->id])}}"> {{$oneOfFive->name}}</a>
                    </div>
                </div>
            @endforeach
            <a class="nav-link h6 text-white btn btn-primary btn-sm" href="{{route('Public')}}">{{ __('View all') }}</a>
        </div>

    </div>
</div>

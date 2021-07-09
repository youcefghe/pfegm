<div class="card shadow rounded-lg" style="width: 20rem;">
    <div class="card-header userDashCom text-center" >
        <p class="h5" style="color: white;">My Communities</p>
    </div>
    <div class="card-body" style="padding-top: 0.25rem;">
        <div class="container">
            @foreach ($mycommunities as $mycommunity)
                <div class="row mb-1" style="border-bottom: 1px solid #bdbdbd" >
                    <div class="d-flex justify-content-center" >
                        <img class="mt-n1 ml-1 mb-2 shadow" src="{{$mycommunity->picture}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <a class="ml-1 mt-1 text-secondary" style="text-decoration: none" href="{{'community',['id'=>$mycommunity->id]}}"> {{$mycommunity->name}}</a>
                        <i  class="fa fa-sign-out text-primary fa-lg ml-2 mt-2"  style="color: #46d160"></i>
                    </div>
                </div>
            @endforeach
            <a class="nav-link h6 text-white btn btn-primary btn-sm" href="{{route('My communities')}}">{{ __('View all') }}</a>
        </div>

    </div>
</div>

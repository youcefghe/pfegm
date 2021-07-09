<div class="row mb-3">
    <div class="card shadow rounded-lg" style="width: 20rem;">
        <div class="card-header userDashCom text-center" >
            <p class="h5" style="color: white;">Community</p>
        </div>
        <div class="card-body">
            <div class="container">
                <x:notify-messages />
                @notifyJs
                <div class="row mb-1" >
                    <div class="d-flex justify-content-center" >
                        <img class="mt-n1 ml-1 mb-2 mt-n2 shadow" src="{{$information->picture}}" style="height: 40px;width: 40px;border-radius: 50%">
                        <p class="ml-1"> {{$information->name}}</p>
                    </div>
                </div>
                <p style="color: #808080;">{{$information->description}}</p>
                <div class="d-flex" style="color: #808080;">
                    <i class="fa fa-birthday-cake mr-2 mt-1" aria-hidden="true"></i>
                    <p >Created in <span style="color: black;">{{$information->created_at->format('d M Y')}} </span></p>
                </div>
                <hr  class="mb-0 mt-0">
                <div class="row" style="color: #808080;">
                    <div class="col-md-6 text-center">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p class="mb-0">Members</p>
                        <p style="color: black;">{{$members}}</p>
                    </div>
                    <div class="col-md-6 text-center">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <p class="mb-0">created by</p>
                        <p style="color: black;">{{$creator}}</p>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        @if($joined == 'yes' )
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    <a class="nav-link h6 btn btn-outline-primary btn-sm rounded-lg" href="{{route('New Post')}}">{{ __('POST') }}</a>

                                </div>
                            </div>
                          <form class="row justify-content-center" action="{{route('Leave community',['id'=> $information->id])}}" method="DELETE">
                                @csrf
                                <button class="nav-link btn-sm mt-2 btn btn-primary rounded-lg h6" type="submit" >{{ __('LEAVE') }}</button>
                            </form>
                        @else

                                <a class="nav-link h6 text-white btn btn-primary btn-sm rounded-lg "   href="@if($joined != 'request'){{route('join',['id'=>$information->id])}}@else # @endif" >@if($joined != 'request') {{ __('JOIN') }}@else{{ __('Request send') }} @endif</a>

                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

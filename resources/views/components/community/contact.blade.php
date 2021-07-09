<div class="row mb-3">
    <div class="card shadow rounded-lg" style="width: 20rem;">
        <div class="card-header userDashCom text-center" >
            <p class="h5" style="color: white;">Contact moderators</p>
        </div>
        <div class="card-body">
            @foreach($moderators as $moderator)
                <div class="d-flex " >
                    <img class="ml-1 mb-2 mt-n1 shadow" src="{{asset($moderator->picture)}}" style="height: 30px;width: 30px;border-radius: 50%">
                    <p class="ml-1"> {{$moderator->name}}</p>
                    <span class="badge badge-outline-success ml-2 mt-1"> Moderator </span>
                </div>
            @endforeach
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <a class="nav-link h6  btn btn-outline-default btn-sm rounded-lg" data-toggle="modal" data-target="#contactMod"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ __('Send mail') }}</a>

                </div>
            </div>
        </div>

    </div>
</div>
<div id="contactMod" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <x-user.edit_information :community="$community"></x-user.edit_information>
        </div>
    </div>
</div>

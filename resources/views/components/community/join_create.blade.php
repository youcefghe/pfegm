
<div class="card shadow rounded-lg" style="width: 20rem;">
    <div class="card-header communitySection text-center" >
    </div>
    <div class="card-body">
        <p class="h5"> Community</p>
        <p>Through the community,you can share all your thoughts with
            people who share similar intellectual tendencies </p>
        <a class="nav-link text-white btn btn-default btn-sm mb-2" data-toggle="modal" data-target="#ModalLoginForm">{{ __('CREATE COMMUNITY') }}</a>
       @if(Request::route()->getName() == '/publiccommunities')
        <a class="nav-link btn btn-outline-default  btn-sm" href="{{route('Public')}}">{{ __('JOIN COMMUNITY') }}</a>
        @endif
    </div>
    <div id="ModalLoginForm" class="modal  fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content w-75" style="background: #f2f8f7; color: #808080;">
                <x-community.create></x-community.create>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

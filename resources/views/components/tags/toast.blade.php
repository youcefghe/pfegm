<div class="toast" style="position: absolute; top: 0; right: 0;"  >
    <div class="toast-header bg-dark" style="background: #47b3a8;">
        <img src="{{json_decode($notification->data)->picture}}" class="rounded mr-2" style="height:40px;width:40px;" >
        <strong class="mr-auto">Mooc Exchange</strong>
        <small>Just now</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="toast-body">
        {{json_decode($notification->data)->message}}
    </div>
</div>

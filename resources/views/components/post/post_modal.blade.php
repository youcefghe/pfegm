<div id="modal-quickview{{$post->id}}" class="modal  fade">
    <div class="modal-dialog modal-dialog-centered " style="max-width: 1200px;" role="document">
        <div class="modal-content" style="background: #f2f8f7; color: #808080;">
            <div class="modal-body mt-3">
                <div class="container-fluid">

                    <div class="row">

                        <x-post.post  :community="$community" :post="$post"></x-post.post>

                        <div class="col-md-4 pl-5" >
                            <x-community.information :information="$community" :members="$members" :joined="$joined" :creator="$creator"></x-community.information>
                            <x-community.ruels></x-community.ruels>
                            <x-community.contact :moderators="$moderators"></x-community.contact>
                            <div class="row mb-3">
                                <x-community.join_create></x-community.join_create>
                            </div>
                            <div class="row mb-3">
                                <x-user.visit_mooc></x-user.visit_mooc>
                            </div>
                            <div class="row mb-3">
                                <x-user.footer></x-user.footer>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<x-add_reply></x-add_reply>

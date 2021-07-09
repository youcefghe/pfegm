<div class="col-md-4 pl-5" >
    <x-community.information :information="$community" :members="$members" :joined="$joined" :creator="$creator"></x-community.information>
    <x-community.ruels :information="$community"></x-community.ruels>
    <x-community.contact :moderators="$moderators" :community="$community"></x-community.contact>
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

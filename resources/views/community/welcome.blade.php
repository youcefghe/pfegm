@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">

        <div class="container "  >
        <x:notify-messages />
        @notifyJs
            <div class="row mr-0 pl-0 @if($community) loading--backgraound @endif" style=" background: url('{{asset($community->cover)}}');width: 100%;height: 150px;background-position: center center; background-size: cover;">

            </div>
            <div class="pb-3" style="position: absolute;">
                <img class="mb-3" src="{{$community->picture}}" style="margin-top:-70px; border-radius: 5px;  height: 120px;width: 120px;">
            </div>

            <div class="row mt-3 " style="padding-top:80px!important;" >

                <x-community.left_side :community="$community" :allposts="$allposts" :joined="$joined" :creator="$creator" :members="$members"  :moderators="$moderators"></x-community.left_side>
                <x-community.right_side :community="$community" :joined="$joined" :creator="$creator" :members="$members"  :moderators="$moderators"></x-community.right_side>
            </div>
        </div>
    </div>

@endsection

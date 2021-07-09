@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">

        <div class="container pt-3"  >
            <x:notify-messages/>
            @notifyJs
            <div class="row mt-5 pos justify-content-center position-relative"  >
                @if($posts)
                <x-user.left_side :posts="$posts"></x-user.left_side>
                @endif
                <x-user.right_side :topFive="$topFive"></x-user.right_side>

            </div>
        </div>
    </div>

@endsection

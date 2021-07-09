@extends('layouts.app')
@section('content')
    <div style="background: #f2f8f7;">

        <div class="container pt-3"  >
            <x:notify-messages/>
            @notifyJs
            <div class="row mt-5 pos justify-content-center position-relative"  >
                @if($posts)
                    <div  class="col-md-8"  >
                        <x-post.new_post_card></x-post.new_post_card>
                        <x-post.filter></x-post.filter>

                        @foreach($posts as $post)
                            <x-post.preview :post="$post" :community="$post->community" ></x-post.preview>
                        @endforeach

                    </div>
                @endif
                <x-user.right_side :topFive="$topFive"></x-user.right_side>

            </div>
        </div>
    </div>

@endsection

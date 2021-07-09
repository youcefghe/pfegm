
@foreach($posts as $post)
    <x-post.preview_profile :post="$post" :community="$post->community"></x-post.preview_profile>
@endforeach


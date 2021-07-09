@foreach($posts as $post)
    <x-moderator.post_preview :post="$post"></x-moderator.post_preview>
@endforeach

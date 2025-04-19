<h3 style="margin-top: 2rem;"><i class="fas fa-blog"></i> Latest Posts</h3>
<ul class="blog-list">
    @if($posts->isNotEmpty())
        @foreach($posts as $post)
            <li><a href="{{route('frontend.blog.details', $post->slug)}}">{{$post->title}}</a></li>
        @endforeach
    @else
        <li>No latest post found.</li>
    @endif
</ul>
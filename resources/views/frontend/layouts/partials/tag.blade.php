<aside class="sidebar">
    <h3><i class="fas fa-tags"></i> Tags</h3>
    <div class="tags-container">
        @if($tags->isNotEmpty())
            @foreach($tags as $tag)
                <span class="tag"><a href="{{ route('frontend.filter', ['tag', $tag->slug]) }}">{{$tag->name}}</a></span>
            @endforeach
        @else
            <li>No tags found.</li>
        @endif
    </div>
</aside>
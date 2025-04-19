@extends('frontend.layouts.master')
@section('content')
    <section class="blog-listing">
    <h2 class="section-title"><i class="fa fa-rss"></i> Latest Blog Posts</h2>
    
    <div class="blog-grid">
        <!-- Blog Post 1 -->
        @forelse ($posts as $post)
        <article class="blog-card">
            <div class="blog-thumbnail">
                <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}">
            </div>
            <div class="blog-content">
                <div class="post-meta">
                    <span><i class="fa fa-calendar"></i> {{ date("d M Y", strtotime($post->created_at)) }}</span>
                    <span><i class="fa fa-eye"></i> {{ $post->total_views }}</span>
                    <span><i class="fa fa-clock-o"></i> 5 min read</span>
                </div>
                <h3 class="post-title"><a href="{{route('frontend.blog.details', $post->slug)}}">{{ $post->title }}</a></h3>
                <p class="post-excerpt">
                {!! $post->short_description !!}</p>
                <a href="{{route('frontend.blog.details', $post->slug)}}" class="read-more">Read More <i class="fa fa-arrow-right"></i></a>
            </div>
        </article>
        @empty
            <h3 class="text-center">{{ __('No Data Found') }}</h3>
        @endforelse
        <!-- Repeat similar structure for other blog posts -->
    </div>
    
    @if($posts->hasPages())
        <div class="pagination">
            @if($posts->currentPage() > 1)
                <a href="{{ $posts->previousPageUrl() }}" class="prev">Previous</a>
            @endif

            @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="{{ $page == $posts->currentPage() ? 'active' : '' }}">
                    {{ $page }}
                </a>
            @endforeach

            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="next">Next</a>
            @endif
        </div>
    @endif
</section>
@endsection

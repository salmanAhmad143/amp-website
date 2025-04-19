@extends('frontend.layouts.master')
@section('content')
    <h2 class="section-title"><i class="fas fa-gem"></i> {{ ucfirst($catalog->name) }}</h2>
    <div class="image-gallery">
        @if($catalog->catalogGallery->isNotEmpty())
            @foreach($catalog->catalogGallery as $gallery)
                <div class="shimmer-wrapper">
                    @if($gallery->type == 'image')
                        <a href="#">
                            <img 
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" 
                                data-src="{{ route('media.path', ['path' => $gallery->resize_path]) }}" 
                                alt="{{$catalog->name}} - {{ $catalog->phone }}"
                                class="lazy"
                            >
                        </a>
                    @else
                        <a href="#">
                            <video 
                                class="lazy" 
                                controls
                                poster="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII="
                                data-src="{{ route('media.path', ['path' => $gallery->actual_path]) }}">
                                <source src="{{ route('media.path', ['path' => $gallery->actual_path]) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </a>
                    @endif
                </div>
            @endforeach
        @endif
    </div>

    @if($catalog?->phone_status)
    <div class="contact-card">
        <div class="contact-icon">
            <i class="fas fa-phone-alt"></i>
        </div>
        <div class="contact-details">
            <h3>Contact Number</h3>
            <a href="tel:+{{ $catalog->phone }}"><p>{{ $catalog->phone ?? '-' }}</p></a>
        </div>
    </div>
    @endif

    <div class="catalog-description">{!! $catalog->description !!}</div>

    <!-- Categories and Tags Section -->
    <div class="metadata-wrapper">
        @if($catalog->catalogCategory->isNotEmpty())
            <div class="category-section">
                <h3 class="section-heading"><i class="fas fa-folder-open"></i> Categories</h3>
                <div class="catelog-category-list">
                    @foreach($catalog->catalogCategory as $catalogCategory)
                        <span class="catelog-category-item">
                            <i class="fas fa-folder"></i>
                            <a href="{{ route('frontend.filter', ['category', $catalogCategory->category->slug]) }}">{{ $catalogCategory->category->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
        @endif

        @if($catalog->catalogTag->isNotEmpty())
            <div class="tag-section">
                <h3 class="section-heading"><i class="fas fa-tags"></i> Tags</h3>
                <div class="catalog-tag-list">
                    @foreach($catalog->catalogTag as $catalogTag)
                        <span class="catalog-tag-item">
                            <i class="fas catalog-fa-tag"></i>
                            <a href="{{ route('frontend.filter', ['tag', $catalogTag->tag->slug]) }}">{{ $catalogTag->tag->name }}</a>
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <!-- Similar Showcase section-->
    @if ($similarShowcases->isNotEmpty())
        <section class="similar-showcases">
            <div class="section-header">
                <i class="fas fa-random section-icon"></i>
                <h2 class="section-title">Similar Showcases</h2>
            </div>
            
            <div class="similar-showcase-grid">
                @foreach($similarShowcases as $showcase)
                    <div class="similar-showcase-item">
                        <a href="{{ route('frontend.catalog.detail', $showcase->catalog->slug) }}" class="showcase-link">
                            <div class="image-wrapper shimmer-wrapper">
                                <img 
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" 
                                    data-src="{{ route('media.path', ['path' => $showcase?->catalogGallery?->resize_path]) }}" 
                                    alt="{{ $showcase?->name }}"
                                    class="lazy showcase-image"
                                >
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif
@endsection

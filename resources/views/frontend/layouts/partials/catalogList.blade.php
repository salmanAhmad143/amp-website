@if ($catalogs->isNotEmpty())
    @foreach($catalogs as $index => $catalog)
        <div class="catalog-item">
            <h2 class="catalog-title">
                <a href="{{ route('frontend.catalog.detail', [$catalog->slug]) }}">
                    <i class="fas fa-th-large"></i> {{ $catalog->name }}
                </a>
            </h2>

            <!-- Image Gallery -->
            <div class="image-gallery">
                @foreach($catalog->catalogGallery->take(3) as $image)
                    <div class="shimmer-wrapper">
                        <a href="{{ route('frontend.catalog.detail', [$catalog->slug]) }}">
                            <img 
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" 
                                data-src="{{ route('media.path', ['path' => $image->resize_path]) }}"
                                alt="{{ $catalog->name }}" 
                                class="lazy loaded"
                            >
                        </a>
                    </div>
                @endforeach
            </div>
            
            @if($catalog?->phone_status)
            <!-- Phone Number -->
            <div class="phone-number">
                <a href="tel:+{{ $catalog->phone }}">
                    <i class="fas fa-phone"></i>
                    {{ $catalog->phone }}
                </a>
            </div>
            @endif

            <!-- Description with More Button -->
            <div class="description" id="desc{{$index}}">
                {!! $catalog->description !!}
            </div>

            <a class="more-button" href="{{ route('frontend.catalog.detail', [$catalog->slug]) }}">More</a>

            <!-- Last Updated Time -->
            <div class="update-time">
                <i class="fas fa-clock"></i>
                Last updated: {{ $catalog->updated_at->format('d F Y, H:i') }}
            </div>
        </div>
    @endforeach
    <!-- Pagination -->
    @if($catalogs->currentPage() > 1)
        <div class="pagination">
            <a href="{{ $catalogs->previousPageUrl() }}" class="prev">Previous</a>                
            @foreach ($catalogs->getUrlRange(1, $catalogs->lastPage()) as $page => $url)
                @if ($page == $catalogs->currentPage())
                    <a href="{{ $url }}" class="active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach

            @if ($catalogs->hasMorePages())
                <a href="{{ $catalogs->nextPageUrl() }}" class="next">Next</a>
            @endif
        </div>
    @endif
@endif
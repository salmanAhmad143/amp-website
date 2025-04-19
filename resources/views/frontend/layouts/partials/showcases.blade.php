@php
    $columns = $settings->showcase_columns;
    $rows = $settings->showcase_rows;
@endphp

<!-- Add Font Awesome 4 CSS in your head section -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="showcase-grid" style="--columns: {{ $columns }};">
    @foreach(array_chunk($positionedItems, $columns) as $row)
            @foreach($row as $showcase)
                <div class="showcase-item">
                    @if($showcase)
                        <div class="shimmer-wrapper">
                            <a href="{{ route('frontend.catalog.detail', $showcase?->catalog?->slug) }}">
                                <img 
                                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNkYAAAAAYAAjCB0C8AAAAASUVORK5CYII=" 
                                    data-src="{{ route('media.path', ['path' => $showcase?->catalogGallery?->resize_path]) }}" 
                                    alt="{{ $showcase?->catalog?->name }} - {{ $showcase?->phone }}"
                                    class="lazy"
                                >
                            </a>
                        </div>
                        <!-- Add info container -->
                        <div class="showcase-info">
                            <div class="showcase-title">
                                <a href="{{ route('frontend.catalog.detail', $showcase?->catalog?->slug) }}" 
                                    class="title-link"
                                     title="{{ $showcase?->catalog?->name}}"
                                >
                                    {{ $showcase?->catalog?->name }}
                                </a>
                            </div>
                            @if($showcase?->catalog?->phone_status)
                            <div class="showcase-phone">
                                <a href="tel:{{ $showcase?->phone }}" class="phone-link" title="{{ $showcase?->phone }}">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    {{ $showcase?->phone }}
                                </a>
                            </div>
                            @endif
                        </div>
                    @else
                        <img 
                            src="{{ asset('assets/admin/img/default.jpg') }}" 
                            alt="Available Spot"
                        >
                    @endif
                </div>
            @endforeach
    @endforeach
</div>

<style>
/* Add these new styles for the icon */
.fa-phone {
    font-size: inherit; /* Inherit from parent */
    margin-right: 5px;
    vertical-align: middle;
    display: inline-block;
}

/* Existing styles remain the same */
.showcase-grid {
    display: grid;
    grid-template-columns: repeat(var(--columns), 1fr);
    gap: 10px;
}

.showcase-item {
    display: flex;
    flex-direction: column;
    min-height: 0;
}

.shimmer-wrapper {
    flex: 1;
    position: relative;
    overflow: hidden;
}

.showcase-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.showcase-info {
    padding: 8px 4px;
    font-size: calc(14px - (var(--columns) * 0.5px));
    line-height: 1.2;
}

.showcase-title,
.showcase-phone {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.title-link {
    color: #333;
    margin-bottom: 4px;
    text-decoration: none;
    text-align: center;
    padding-left: 4px;
}

.phone-link {
    color: #007bff;
    text-decoration: none;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: center;
    padding-left: 4px;
}

.title-link:hover {
    color: red;
    text-decoration: underline;
}

.phone-link:hover {
    color: #0056b3;
    text-decoration: underline;
}

@media (max-width: 768px) {
    .showcase-info {
        font-size: 10px;
    }
    /* Adjust icon size for mobile */
    .fa-phone {
        margin-right: 3px;
    }
}
</style>
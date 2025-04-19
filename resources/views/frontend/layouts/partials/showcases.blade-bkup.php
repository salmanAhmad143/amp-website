@php
    $columns = $settings->showcase_columns;
    $rows = $settings->showcase_rows;
@endphp

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
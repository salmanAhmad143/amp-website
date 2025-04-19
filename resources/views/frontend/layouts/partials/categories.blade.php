<h3><i class="fas fa-boxes"></i> Categories</h3>
<ul class="category-list">
    @if($categories->isNotEmpty())
        @foreach($categories as $category)
            <li><a href="{{ route('frontend.filter', ['category', $category->slug]) }}">{{$category->name}}</a></li>
        @endforeach
    @else
        <li>No category found.</li>
    @endif
</ul>

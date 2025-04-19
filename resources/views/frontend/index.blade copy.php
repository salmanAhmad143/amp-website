@extends('frontend.layouts.master')
@section('content')
    <h2><i class="fas fa-gem"></i> Showcases</h2>
    <!-- Image Gallery -->
    <div class="image-gallery">
        <!-- Repeat this block for each image -->
        @if($showcases->isNotEmpty())
            <div class="showcase-grid" style="--columns: {{ $settings->showcase_columns }};">
                @foreach($showcases as $item)
                    <div class="showcase-item">
                        <a href="{{ route('frontend.catalog.detail') }}">
                            <img src="{{ asset($item->image_path) }}" alt="{{ $item->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="no-items">
                <p>No showcase found.</p>
            </div>
        @endif
        {{-- <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=1" alt="Showcase Image 1">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=2" alt="Showcase Image 2">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=3" alt="Showcase Image 3">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=4" alt="Showcase Image 4">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=5" alt="Showcase Image 5">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=6" alt="Showcase Image 6">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=7" alt="Showcase Image 7">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=8" alt="Showcase Image 8">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=9" alt="Showcase Image 9">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=10" alt="Showcase Image 10">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=11" alt="Showcase Image 1">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=12" alt="Showcase Image 12">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=13" alt="Showcase Image 13">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=14" alt="Showcase Image 14">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=15" alt="Showcase Image 15">
        </a>
        <a href="{{ route('frontend.catalog.detail') }}">
            <img src="https://picsum.photos/300/300?random=16" alt="Showcase Image 16">
        </a> --}}
    </div>

    <!-- Pagination Controls -->
    <div class="pagination">
        <!-- Example static pagination links, use dynamic page links based on backend logic -->
        {{-- <a href="#" class="prev">Previous</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">Next</a> --}}
        {{ $showcases->links() }}
    </div>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2A5C82;
            --secondary: #FF6B6B;
            --accent: #4ECDC4;
            --light: #F7FFF7;
            --dark: #1A1A1A;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: var(--light);
            color: var(--dark);
        }

        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: white;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }

        .nav {
            background: var(--primary);
            padding: 1rem 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .menu {
            display: flex;
            gap: 1rem;
            list-style: none;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease-out;
        }

        .nav a {
            color: white;
            text-decoration: none;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .nav a:hover {
            background: var(--accent);
            transform: translateY(-2px);
        }

        .menu-icon {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: white;
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
        }

        .container {
            display: grid;
            grid-template-columns: 250px 1fr 250px;
            gap: 2rem;
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
            flex: 1;
        }

        .sidebar {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .sidebar h3 {
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .category-list,
        .blog-list {
            list-style: none;
        }

        .category-list li,
        .blog-list li {
            padding: 1rem;
            margin: 0.5rem 0;
            background: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .category-list li:hover,
        .blog-list li:hover {
            transform: translateX(5px);
            background: var(--accent);
            color: white;
        }

        .content {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin: 2rem 0;
        }

        .image-gallery div {
            aspect-ratio: 1;
            background: #e9ecef;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
        }

        .image-gallery div:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .phone {
            display: inline-flex;
            align-items: center;
            gap: 1rem;
            background: var(--primary);
            color: white;
            padding: 1rem 2rem;
            border-radius: 50px;
            margin: 1rem 0;
        }

        .tags-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .tag {
            background: var(--accent);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .tag:hover {
            background: var(--primary);
        }

        .show-more {
            color: var(--primary);
            cursor: pointer;
            text-decoration: none;
            margin-top: 1rem;
            display: inline-block;
        }

        .footer {
            background: var(--primary);
            color: white;
            text-align: center;
            padding: 1.5rem;
            margin-top: auto;
        }

        /* Grid Container */
        .showcase-grid {
            display: grid;
            grid-template-columns: repeat(var(--columns), 1fr);
            gap: 20px; /* Adjust spacing between items */
            max-width: 1200px; /* Set max width as needed */
            margin: 0 auto;
            padding: 20px;
        }

        /* Grid Items */
        .showcase-item {
            position: relative;
            overflow: hidden;
            aspect-ratio: 1 / 1; /* Maintain square ratio */
        }

        .item-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .item-link:hover .item-image {
            transform: scale(1.05);
        }

        /* No Items Message */
        .no-items-message {
            grid-column: 1 / -1;
            text-align: center;
            padding: 40px;
            font-size: 1.2rem;
            color: #666;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .showcase-grid {
                grid-template-columns: repeat(3, 1fr); /* Example breakpoint */
            }
        }

        @media (max-width: 768px) {
            .showcase-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }

        @media (max-width: 480px) {
            .showcase-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Similar Products */
        .similar-products {
            margin-top: 3rem;
            padding: 1.5rem 0;
            border-top: 2px solid var(--primary);
        }

        .similar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 1rem;
        }

        .similar-item {
            background: white;
            padding: 1rem;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            text-align: center;
            max-width: 220px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        .similar-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .similar-image {
            aspect-ratio: 1;
            background: #e9ecef;
            border-radius: 10px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            width: 120px;
            height: 120px;
            margin: 0 auto 1rem;
        }

        .similar-name {
            color: var(--primary);
            font-weight: 600;
            font-size: 0.95rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100%;
            padding: 0 0.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 1024px) {
            .similar-grid {
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            }
            .similar-image {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 768px) {
            .similar-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            }
            .similar-name {
                font-size: 0.9rem;
            }
            .similar-image {
                width: 80px;
                height: 80px;
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .similar-grid {
                grid-template-columns: 1fr;
                max-width: 300px;
                margin: 0 auto;
            }
            .similar-image {
                width: 120px;
                height: 120px;
            }
        }

        @media (max-width: 1024px) {
            .image-gallery {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .image-gallery {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .image-gallery {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .container {
                grid-template-columns: 1fr;
                padding: 1rem;
            }

            .menu {
                flex-direction: column;
                max-height: 0;
                overflow: hidden;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--primary);
                transition: max-height 0.3s ease-out;
            }

            .menu.active {
                max-height: 500px;
            }

            .nav a {
                padding: 1rem;
                border-radius: 0;
                justify-content: flex-start;
            }

            .menu-icon {
                display: block;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <header class="header">
            <h1>📚 Modern Catalog</h1>
            <p>Discover Amazing Products</p>
        </header>

        <nav class="nav">
            <div class="menu-icon" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </div>
            <div class="menu">
                <a href="#"><i class="fas fa-home"></i> Home</a>
                <a href="#"><i class="fas fa-info-circle"></i> About</a>
                <a href="#"><i class="fas fa-envelope"></i> Contact</a>
            </div>
        </nav>

        <div class="container">
            <aside class="sidebar">
                <h3><i class="fas fa-boxes"></i> Categories</h3>
                <ul class="category-list">
                    <li><i class="fas fa-tv"></i> Electronics</li>
                    <li><i class="fas fa-couch"></i> Furniture</li>
                    <li><i class="fas fa-tshirt"></i> Clothing</li>
                    <li><i class="fas fa-book-open"></i> Books</li>
                </ul>

                <h3 style="margin-top: 2rem;"><i class="fas fa-blog"></i> Latest Posts</h3>
                <ul class="blog-list">
                    <li><i class="fas fa-mobile-alt"></i> Top 10 Gadgets 2024</li>
                    <li><i class="fas fa-paint-brush"></i> Interior Design Tips</li>
                    <li><i class="fas fa-walking"></i> Fashion Trends</li>
                    <li><i class="fas fa-book"></i> Must-Read Books</li>
                </ul>
            </aside>

            <main class="content">
                <h2><i class="fas fa-gem"></i> Catalog</h2>
                <div class="image-gallery">
                    <div>📷 Image 1</div>
                    <div>📷 Image 2</div>
                    <div>📷 Image 3</div>
                    <div>📷 Image 4</div>
                    <div>📷 Image 5</div>
                    <div>📷 Image 6</div>
                    <div>📷 Image 7</div>
                    <div>📷 Image 8</div>
                    <div>📷 Image 9</div>
                    <div>📷 Image 10</div>
                </div>

                <div class="phone">
                    <i class="fas fa-phone-alt"></i>
                    +1 234 567 8900
                </div>

                <p class="description">
                    Discover this amazing product with premium features. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                    Quisquam voluptatum voluptatem doloremque.
                </p>

                <div class="tags-container">
                    <span class="tag"><i class="fas fa-tag"></i> Electronics</span>
                    <span class="tag"><i class="fas fa-tag"></i> Gadgets</span>
                    <span class="tag"><i class="fas fa-tag"></i> Innovation</span>
                </div>

                <!-- Add this right BEFORE the closing </main> tag -->
                <section class="similar-products">
                    <h2><i class="fas fa-random"></i> Similar Catalogs</h2>
                    <div class="similar-grid">
                        <div class="similar-item">
                            <div class="similar-image">📷</div>
                            <div class="similar-name">Wireless Headphones</div>
                        </div>
                        <div class="similar-item">
                            <div class="similar-image">📷</div>
                            <div class="similar-name">Smart Watch Lite</div>
                        </div>
                        <div class="similar-item">
                            <div class="similar-image">📷</div>
                            <div class="similar-name">Bluetooth Speaker</div>
                        </div>
                        <div class="similar-item">
                            <div class="similar-image">📷</div>
                            <div class="similar-name">Fitness Tracker</div>
                        </div>
                    </div>
                </section>
            </main>
            
            <aside class="sidebar">
                <h3><i class="fas fa-tags"></i> Tags</h3>
                <div class="tags-container">
                    <span class="tag">Electronics</span>
                    <span class="tag">Furniture</span>
                    <span class="tag">Clothing</span>
                    <span class="tag">Books</span>
                    <span class="tag">Home Decor</span>
                    <span class="tag">Kitchen</span>
                    <span class="tag">Gadgets</span>
                    <span class="tag">Toys</span>
                    <span class="tag">Sports</span>
                    <span class="tag">Fitness</span>
                    <span class="tag">Beauty</span>
                    <span class="tag">Travel</span>
                    <span class="tag">Automotive</span>
                    <span class="tag">Art</span>
                    <span class="tag">Music</span>
                    <span class="tag extra-tag">Pet Supplies</span>
                    <span class="tag extra-tag">Jewelry</span>
                    <span class="tag extra-tag">Shoes</span>
                    <span class="tag extra-tag">Watches</span>
                    <span class="tag extra-tag">Outdoor</span>
                </div>
                <span class="show-more" onclick="toggleTags()">Show more...</span>
            </aside>
        </div>

        <footer class="footer">
            © 2024 Modern Catalog. Crafted with ❤️
        </footer>
    </div>

    <script>
        function toggleMenu() {
            const menu = document.querySelector('.menu');
            menu.classList.toggle('active');
        }

        function toggleTags() {
            const extraTags = document.querySelectorAll('.extra-tag');
            const showMore = document.querySelector('.show-more');
            
            extraTags.forEach(tag => {
                tag.style.display = tag.style.display === 'none' ? 'inline-block' : 'none';
            });
            
            showMore.textContent = showMore.textContent.includes('more') 
                ? 'Show less...' : 'Show more...';
        }

        // Initially hide extra tags
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.extra-tag').forEach(tag => {
                tag.style.display = 'none';
            });
        });
    </script>
</body>
</html> --}}
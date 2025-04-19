<!-- Header -->
<header class="header">
    <h1>📷 <a href="{{route('frontend.home')}}">Showcase Gallery</a></h1>
    <p><a href="{{route('frontend.home')}}">Explore Our Creative Works</a></p>
</header>

<!-- Navigation -->
<nav class="nav">
    <div class="menu-icon" onclick="toggleMenu()">
        <i class="fas fa-bars"></i>
    </div>
    <div class="menu">
        <a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i> Home</a>
        @foreach($menus as $menu)
            <a href="{{ $menu->slug }}"><i class="fas fa-home"></i> {{ $menu->title }}</a>
        @endforeach
        
        <a href="{{ route('frontend.blog') }}"><i class="fa fa-calendar-check"></i> Blog</a>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.querySelector('.menu');
        menu.classList.toggle('active');
    }
</script>
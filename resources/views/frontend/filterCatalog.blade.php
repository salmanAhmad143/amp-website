@extends('frontend.layouts.master')
@section('content')
    <h2><i class="fas fa-gem"></i> Showcases</h2>    
    <!-- Showcase Grid Container -->
    <div class="showcase-container">
        @include('frontend.layouts.partials.showcases')
    </div>

    <!-- Catalog Listing-->
    @include('frontend.layouts.partials.catalogList')
@endsection
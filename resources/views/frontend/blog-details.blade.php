@extends('frontend.layouts.master')
@section('website_title', ucfirst($post->title ))
@section('meta_title', ucfirst($post->title ))
@section('meta_description', Str::limit($post->description, 160))
@section('meta_keywords', $post->title)
@section('meta_image', $post->thumbnail)
@section('content')
<main class="blog-detail">
    <article class="article-content">
        <div class="article-header">
            <img src="{{ $post->thumbnail }}" alt="{{ $post->title }}" class="article-image">
            <div class="article-meta">
                <span><i class="fa fa-user"></i> {{ ucfirst($post->user->name) }}</span>
                <span><i class="fa fa-calendar"></i> {{ date("d M Y", strtotime($post->created_at)) }}</span>
                <span><i class="fa fa-eye"></i> {{ $post->total_views }}</span>
            </div>
            <h1 class="article-title">{{ $post->title }}</h1>
        </div>

        <div class="article-body">
            {!! $post->description !!}
        </div>
    </article>
</main>
@endsection

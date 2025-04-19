<?php

// app/Services/SitemapGenerator.php
namespace App\Services;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Catalog;
use App\Models\Showcase;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;

class SitemapGenerator
{
    public function generate()
    {
        $sitemap = Sitemap::create()
            ->add($this->createUrl(route('frontend.home'), 1.0, 'daily'))
            ->add($this->createUrl(route('frontend.blog'), 0.8, 'weekly'));

        // Add catalog details
        $this->addCatalogs($sitemap);
        
        // Add filter pages
        $this->addFilters($sitemap);
        
        // Add blog posts
        $this->addBlogPosts($sitemap);

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }

    protected function createUrl(string $url, float $priority, string $frequency): Url
    {
        return Url::create($url)
            ->setPriority($priority)
            ->setChangeFrequency($frequency)
            ->setLastModificationDate(Carbon::now());
    }

    protected function addCatalogs(Sitemap $sitemap)
    {
        Catalog::active()->with('showcase')->chunk(500, function ($catalogs) use ($sitemap) {
            foreach ($catalogs as $catalog) {
                // Main catalog page
                $sitemap->add(
                    $this->createUrl(
                        route('frontend.catalog.detail', [
                            'slug' => $catalog->slug
                        ]),
                        0.9,
                        'weekly'
                    )
                );
            }
        });
    }

    protected function addFilters(Sitemap $sitemap)
    {
        // Categories
        Category::active()->chunk(500, function ($categories) use ($sitemap) {
            foreach ($categories as $category) {
                $sitemap->add(
                    $this->createUrl(
                        route('frontend.filter', [
                            'filterBy' => 'category',
                            'slug' => $category->slug
                        ]),
                        0.6,
                        'weekly'
                    )
                );
            }
        });

        // Tags
        Tag::active()->chunk(500, function ($tags) use ($sitemap) {
            foreach ($tags as $tag) {
                $sitemap->add(
                    $this->createUrl(
                        route('frontend.filter', [
                            'filterBy' => 'tag',
                            'slug' => $tag->slug
                        ]),
                        0.5,
                        'weekly'
                    )
                );
            }
        });
    }

    protected function addBlogPosts(Sitemap $sitemap)
    {
        Post::published()->chunk(500, function ($posts) use ($sitemap) {
            foreach ($posts as $post) {
                $sitemap->add(
                    Url::create(route('frontend.blog.details', $post->slug))
                        ->setPriority(0.8)
                        ->setChangeFrequency('monthly')
                        ->setLastModificationDate($post->updated_at)
                        // ->addAlternate(route('amp.blog.details', $post->slug), 'en')
                );
            }
        });
    }
}
?>
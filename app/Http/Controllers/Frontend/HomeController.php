<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools;
use Illuminate\Http\Request;
use App\Models\Showcase;
use App\Models\Catalog;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Str;

class HomeController extends Controller
{
    use SEOTools;
    private $setting = '';

    public function __construct()
    {
        $this->middleware('web');
        $this->setting = Setting::first();
    }

    public function index() {
        $this->seo()
            ->setTitle($this->setting->meta_title)
            ->setDescription(strip_tags($this->setting->meta_description))
            ->metatags()->setKeywords($this->setting->meta_tag);
        $this->seo()->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        $this->seo()->twitter()
            ->setSite(url()->current());
        $this->seo()->jsonLd()
            ->setType('Website');

        $catalogs = Catalog::with('catalogGallery')
            ->whereHas('showcase', function($query) {
                $query->active();
            })
            ->latest()
            ->paginate(20);        
        return view('frontend.index', [
            ...$this->getShowcases(),
            'catalogs' => $catalogs
        ]);
    }

    public function getShowcases() {
        // Get all active showcases ordered by position
        $showcases = Showcase::with('catalog')
            ->whereHas('catalog', function ($query) {
                $query->active()
                    ->whereHas('catalogGallery');
            })
            ->where('status', 1)
            ->orderBy('position')
            ->get()
            ->keyBy('position');

        // Calculate total grid positions
        $totalPositions = $this->setting->showcase_columns * $this->setting->showcase_rows;
        
        // Create array with all positions (filled or null)
        $positions = range(1, $totalPositions);
        $positionedItems = array_map(function($pos) use ($showcases) {
            return $showcases->has($pos) ? $showcases[$pos] : null;
        }, $positions);

        return [
            'positionedItems' => $positionedItems,
            'settings' => $this->setting
        ];
    }

    public function catalogDetail($slug) {
        $catalog = Catalog::with('catalogGallery', 'catalogTag.tag', 'catalogCategory', 'showcase')
            ->where('slug', $slug)
            ->first();
        $this->seo()
            ->setTitle($catalog->name)
            ->setDescription(Str::limit(strip_tags($catalog->description), 160))
            ->metatags()->setKeywords($catalog->catalogTag->pluck('tag.name')->implode(', '). ', ' . $catalog->catalogCategory->pluck('category.name')->implode(', '));
        $this->seo()->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        $this->seo()->twitter()
            ->setSite(url()->current());
        $this->seo()->jsonLd()
            ->setType('Website');
        $similarShowcases = $this->similarShowcases($catalog);
        return view('frontend.catalogDetail', compact('catalog', 'similarShowcases'));
    }

    public function similarShowcases($catalog) {
        $tagIds = $catalog->catalogTag->pluck('tag_id');
        $categoryIds = $catalog->catalogCategory->pluck('category_id');
        $similarCatalogs = Catalog::whereHas('catalogTag', function($query) use ($tagIds) {
            $query->whereIn('tag_id', $tagIds);
        })
        ->orWhereHas('catalogCategory', function($query) use ($categoryIds) {
            $query->whereIn('category_id', $categoryIds);
        })
        ->pluck('id');
            
        // return showcases related to these catalogs
        return Showcase::with('catalog')
            ->whereIn('catalog_id', $similarCatalogs)
            ->where('status', 1)
            ->orderBy('position')
            ->distinct()
            ->limit($this->setting->similar_showcase)
            ->get();
    }

    public function filterCatalog($filterBy, $slug) {
        // Validate filter type
        $filters = [
            'tag' => ['model' => Tag::class, 'relation' => 'catalogTag.tag'],
            'category' => ['model' => Category::class, 'relation' => 'catalogCategory.category'],
        ];

        $targetObject = $filters[$filterBy]['model']::where('slug', $slug)->where('status', 1);
    
        // Validate filter type and slug existence
        if (!isset($filters[$filterBy]) || !$targetObject->exists()) {
            abort(404);
        }


        $this->seo()
            ->setTitle($targetObject->first()->name)
            ->setDescription(Str::limit(strip_tags($targetObject->first()->description), 160))
            ->metatags()->setKeywords($targetObject->first()->keyword);
        $this->seo()->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        $this->seo()->twitter()
            ->setSite(url()->current());
        $this->seo()->jsonLd()
            ->setType('Website');
        
        // Fetch catalogs with relationships
        $catalogs = Catalog::with($filters[$filterBy]['relation'], 'catalogGallery')
            ->whereHas($filters[$filterBy]['relation'], fn($q) => $q->where('slug', $slug))
            ->where('status', 1)
            ->latest()
            ->paginate(20);
    
        return view('frontend.filterCatalog', [
            ...$this->getShowcases(),
            'catalogs' => $catalogs
        ]);
    }    

    public function blog()
    {
        $this->seo()
            ->setTitle('Blog Post')
            ->setDescription('Blog post listing page.');
        $this->seo()->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        $this->seo()->twitter()
            ->setSite(url()->current());
        $this->seo()->jsonLd()
            ->setType('Website');

        $posts = Post::latest()->paginate(12);
        return view('frontend.blog', compact('posts'));
    }

    public function blogDetails(Post $post)
    {
        $this->seo()
            ->setTitle($post->title)
            ->setDescription(Str::limit(strip_tags($post->description), 160));
        $this->seo()->opengraph()
            ->setUrl(url()->current())
            ->addProperty('type', 'website');
        $this->seo()->twitter()
            ->setSite(url()->current());
        $this->seo()->jsonLd()
            ->setType('Website');

        $post->increment('total_views');
        $post->load('user');
        // $popular_posts = Post::select('id', 'title', 'slug', 'thumbnail')
        //     ->latest('total_views')
        //     ->limit(4)
        //     ->get();
        // $latest_posts = Post::select('id', 'title', 'slug', 'thumbnail')
        //     ->where('id', '!=', $post->id)
        //     ->latest()
        //     ->limit(3)
        //     ->get();
        return view('frontend.blog-details', compact('post'));
    }
}

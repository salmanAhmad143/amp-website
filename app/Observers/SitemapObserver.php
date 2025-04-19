<?php

// app/Observers/SitemapObserver.php
namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Services\SitemapGenerator;

class SitemapObserver
{
    private $generator;

    public function __construct(SitemapGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function saved(Model $model)
    {
        if($this->shouldRegenerate($model)) {
            $this->generator->generate();
        }
    }

    public function deleted(Model $model)
    {
        if($this->shouldRegenerate($model)) {
            $this->generator->generate();
        }
    }

    private function shouldRegenerate(Model $model): bool
    {
        return in_array(get_class($model), [
            \App\Models\Catalog::class,
            \App\Models\Showcase::class,
            \App\Models\Post::class,
            \App\Models\Category::class,
            \App\Models\Tag::class
        ]);
    }
}
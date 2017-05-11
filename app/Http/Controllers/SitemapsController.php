<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Question;
use App\Video;
use Watson\Sitemap\Facades\Sitemap;

class SitemapsController extends Controller
{
    public function index()
    {

        foreach (config('site.sitemap') as $content) {
            Sitemap::addSitemap(url('sitemap_'.$content.'.xml'));
        }

        return Sitemap::index();
    }

    public function posts()
    {
        $contents = Post::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url($content->slug.'.html'), $content->updated_at, 'daily', '0.8');
        }
        return Sitemap::render();
    }

    public function categories()
    {
        $contents = Category::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('chuyen-muc', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function questions()
    {
        $contents = Question::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('hoi-dap', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }

    public function videos()
    {
        $contents = Video::all();
        foreach ($contents as $content) {
            Sitemap::addTag(url('video', $content->slug), $content->updated_at, 'weekly', '0.4');
        }
        return Sitemap::render();
    }
}

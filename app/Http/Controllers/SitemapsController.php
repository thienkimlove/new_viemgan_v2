<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Question;
use App\Video;

class SitemapsController extends Controller
{
    public function index()
    {
        $maps = [];

        foreach (config('site.sitemap') as $content) {
            $maps[] = [
                'url' => url('sitemap_'.$content.'.xml'),
                'time' => date('Y-m-d H:i')
            ];
        }

        return view('frontend.sitemap.index', compact('maps'));
    }

    public function posts()
    {
        $posts = Post::all();

        $map = [
            [
                'url' => url('/'),
                'time' => '',
                'frequency' => 'daily',
                'priority' => '100%',
                'images' => 0
            ]
        ];

        foreach ($posts as $post) {
            $map[] = [
                'url' => url($post->slug.'.html'),
                'time' => $post->updated_at,
                'frequency' => 'weekly',
                'priority' => '60%',
                'images' => 1
            ];
        }

        return view('frontend.sitemap.content', compact('map'));
    }

    public function categories()
    {

        $map = [];

        $categories = Category::all();
        foreach ($categories as $category) {
            $map[] = [
                'url' => url('chuyen-muc', $category->slug),
                'time' => $category->updated_at,
                'frequency' => 'weekly',
                'priority' => '40%',
                'images' => 0
            ];
        }
        return view('frontend.sitemap.content', compact('map'));
    }

    public function questions()
    {

        $map = [];

        $contents = Question::all();
        foreach ($contents as $content) {
            $map[] = [
                'url' => url('hoi-dap', $content->slug),
                'time' => $content->updated_at,
                'frequency' => 'weekly',
                'priority' => '40%',
                'images' => 0
            ];
        }
        return view('frontend.sitemap.content', compact('map'));
    }

    public function videos()
    {

        $map = [];

        $contents = Video::all();
        foreach ($contents as $content) {
            $map[] = [
                'url' => url('video', $content->slug),
                'time' => $content->updated_at,
                'frequency' => 'weekly',
                'priority' => '40%',
                'images' => 0
            ];
        }
        return view('frontend.sitemap.content', compact('map'));
    }
}

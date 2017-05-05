<?php

namespace App\Http\Controllers;

use App\Category;
use App\Module;
use App\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $page = 'index';

        //show on index top.
        $indexTopModules = Module::where('key_type', 'display_in_index_top')
            ->where('key_content', 'posts')
            ->pluck('key_value')
            ->all();

        $indexTopPosts = Post::where('status', true)
            ->latest('created_at')
            ->whereIn('id', $indexTopModules)
            ->limit(5)
            ->get();

        //parent on index.
        $indexParentModules1 = Module::where('key_type', 'index_block_1')
            ->where('key_content', 'categories')
            ->pluck('key_value')
            ->all();

        $indexParentModules2 = Module::where('key_type', 'index_block_2')
            ->where('key_content', 'categories')
            ->pluck('key_value')
            ->all();

        $indexParentModules3 = Module::where('key_type', 'index_block_3')
            ->where('key_content', 'categories')
            ->pluck('key_value')
            ->all();

        $indexParentModules4 = Module::where('key_type', 'index_block_4')
            ->where('key_content', 'categories')
            ->pluck('key_value')
            ->all();

        $indexParentCategory1 = Category::whereIn('id', $indexParentModules1)
            ->limit(1)
            ->first();

        $indexParentCategory2 = Category::whereIn('id', $indexParentModules2)
            ->limit(1)
            ->first();

        $indexParentCategory3 = Category::whereIn('id', $indexParentModules3)
            ->limit(1)
            ->first();

        $indexParentCategory4 = Category::whereIn('id', $indexParentModules4)
            ->limit(1)
            ->first();




        return view('frontend.index', compact('page', 'indexTopPosts', 'indexParentCategory1', 'indexParentCategory2', 'indexParentCategory3', 'indexParentCategory4'));
    }
}

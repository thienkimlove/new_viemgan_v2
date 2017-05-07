<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\District;
use App\Module;
use App\Order;
use App\Post;
use App\Province;
use App\Question;
use App\Store;
use App\Video;
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

    public function category($slug)
    {
        $category = Category::findBySlug($slug);
        $page = ($category->parent_id) ? $category->parent->slug : $category->slug;

        $subCategoryIds = Category::where('parent_id', $category->id)->pluck('id')->all();
        $categoryIds = ($subCategoryIds) ? $subCategoryIds : [$category->id];

        $posts = Post::where('status', true)->whereIn('category_id', $categoryIds)->paginate(10);
        return view('frontend.category', compact('page', 'posts', 'category'));
    }

    public function saveContact(Request $request)
    {
        Contact::create($request->all());
        return redirect('/');
    }

    public function question($slug = null)
    {
        $page = 'hoi-dap';
        if ($slug) {
            $question = Question::findBySlug($slug);
            return view('frontend.question_detail', compact('page', 'question'));
        } else {

            $questions = Question::where('status', true)->latest('created_at')->paginate(10);

            return view('frontend.question', compact('page', 'questions'));
        }
    }

    public function post($slug)
    {

        if (preg_match('/([a-z0-9\-]+)\.html/', $slug, $matches)) {
            $post = Post::findBySlug($matches[1]);
            $page = ($post->category->parent_id) ? $post->category->parent->slug : $post->category->slug;
            if ($post->content_1 && $post->content_2) {
                return view('frontend.product', compact('page', 'post'));
            } else {
                return view('frontend.post', compact('page', 'post'));
            }

        }
    }

    public function contact()
    {
        $page = 'lien-he';
        return view('frontend.contact', compact('page'));
    }

    public function delivery($slug = null)
    {
        $page = 'phan-phoi';

        if ($slug) {
            $province = Province::findBySlug($slug);
            return view('frontend.delivery_detail', compact('province', 'page'));
        } else {
            $provinces = Province::orderBy('id')->get();
            return view('frontend.delivery', compact('provinces', 'page'));
        }
    }

    public function ajax_store(Request $request)
    {
        $districtId = $request->input('district_id');
        $stores = Store::where('district_id', $districtId)->get();
        $html = view('frontend.store_list', compact('stores'))->render();

        return response()->json(['html' => $html]);
    }
        
    public function saveOrder(Request $request)
    {
        $data = $request->all();
        
        if (!empty($data['name']) && !empty($data['address']) && !empty($data['product_id']) && !empty($data['quantity']) && !empty($data['phone'])) {

            Order::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'product_id' => $data['product_id'],
                'quantity' => $data['quantity'],
                'note' => (isset($data['note'])) ? $data['note'] : '',
                'status' => 0
            ]);
        }

        return redirect('/');
        
    }

    public function video($slug = null)
    {
        $page = 'video';
        $mainVideo = null;

        if ($slug) {
            $mainVideo = Video::findBySlug($slug);
            $mainVideo->increment('views', 1);
        }
        $videos = Video::paginate(12);
        return view('frontend.video', compact('mainVideo', 'videos', 'page'));
    }
}

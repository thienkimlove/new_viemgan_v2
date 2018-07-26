<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\District;
use App\Land;
use App\Module;
use App\Order;
use App\Post;
use App\Province;
use App\Question;
use App\Register;
use App\Store;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    public function index()
    {
        $page = 'index';

        $indexTopPosts = DB::table('posts')
            ->select('posts.image', 'posts.slug', 'posts.title')
            ->latest('posts.created_at')
            ->join('modules', 'modules.key_value', '=', 'posts.id')
            ->where('modules.key_type', 'display_in_index_top')
            ->where('modules.key_content', 'posts')
            ->limit(5)
            ->get();

        $indexCategories = DB::table('categories')
            ->join('modules', 'modules.key_value', '=', 'categories.id')
            ->where('modules.key_content', 'categories')
            ->whereIn('key_type',  [
                'index_block_1',
                'index_block_2',
                'index_block_3',
                'index_block_4',
            ])
            ->select('modules.key_type', 'categories.id', 'categories.name')
            ->get();

        return view('frontend.index', compact('page', 'indexTopPosts', 'indexCategories'));
    }

    public function write()
    {
        $page = 'index';
        $meta_title = 'Đăng bài viết';
        $meta_desc = 'Đăng bài viết';

        return view('frontend.write', compact('page', 'meta_title', 'meta_desc'));
    }

    public function category($slug)
    {
        $category = Category::findBySlug($slug);
        if ($category) {
            $page = ($category->parent_id) ? $category->parent->slug : $category->slug;

            $meta_title = $category->seo_name ? $category->seo_name : $category->name;
            $meta_desc = $category->desc;

            $subCategoryIds = Category::where('parent_id', $category->id)->pluck('id')->all();
            $categoryIds = ($subCategoryIds) ? $subCategoryIds : [$category->id];

            $posts = Post::where('status', true)->latest('created_at')->whereIn('category_id', $categoryIds)->paginate(10);
            return view('frontend.category', compact('page', 'posts', 'category', 'meta_title', 'meta_desc'));
        }  else {
            return redirect('/');
        }
    }

    public function saveRegister(Request $request)
    {
        Register::create($request->all());
        return redirect('/');
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
            if ($question) {
                $meta_title = $question->seo_name ? $question->seo_name : $question->title;
                $meta_desc = $question->seo_desc ? $question->seo_desc : $question->short_answer;

                return view('frontend.question_detail', compact('page', 'question', 'meta_title', 'meta_desc'));
            } else {
                return redirect('/');
            }
        } else {
            $questions = Question::where('status', true)->latest('created_at')->paginate(10);
            return view('frontend.question', compact('page', 'questions'));
        }
    }

    public function post($slug)
    {

        if (preg_match('/([a-z0-9\-]+)\.html/', $slug, $matches)) {
            $post = Post::findBySlug($matches[1]);
            if ($post) {
                $meta_title = $post->tieude ? $post->tieude : $post->title;
                $meta_desc = $post->desc;
                $post->increment('views', 1);
                $page = ($post->category->parent_id) ? $post->category->parent->slug : $post->category->slug;
                if ($post->content_1 && $post->content_2) {
                    return view('frontend.product', compact('page', 'post',  'meta_title', 'meta_desc'));
                } else {
                    return view('frontend.post', compact('page', 'post', 'meta_title', 'meta_desc'));
                }
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/');
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

            $success_delivery_form_message = null;

            if (session()->has('success_delivery_form_message')) {
                $success_delivery_form_message = true;
                session()->forget('success_delivery_form_message');
            }

            return view('frontend.delivery', compact('provinces', 'page', 'success_delivery_form_message'));
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
        $redirectUrl = null;

        if (isset($data['redirect_url'])) {
            $redirectUrl = $data['redirect_url'];
            unset($data['redirect_url']);
        }
        
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


        if ($redirectUrl) {
            session()->put('success_delivery_form_message', true);
            return redirect()->to($redirectUrl);
        }

        return redirect('/');
        
    }

    public function landing()
    {
        return view('frontend.landing');
    }

    public function saveLand(Request $request)
    {
        $data = $request->all();

        if (!empty($data['name']) && !empty($data['address']) && !empty($data['phone']) && !empty($data['subject']) && !empty($data['email']) && !empty($data['content'])) {

            Land::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'phone' => $data['phone'],
                'email' => $data['email'],
                'subject' => $data['subject'],
                'content' => $data['content'],
            ]);
        }

        return redirect('/landingpage');

    }

    public function video($slug = null)
    {
        $page = 'video';
        $mainVideo = null;

        if ($slug) {
            $mainVideo = Video::findBySlug($slug);
            if ($mainVideo) {
                $meta_title = $mainVideo->seo_name ? $mainVideo->seo_name : $mainVideo->title;
                $meta_desc =  $mainVideo->seo_desc ? $mainVideo->seo_desc : $mainVideo->desc;

                $mainVideo->increment('views', 1);
                $videos = Video::paginate(12);
                return view('frontend.video', compact('mainVideo', 'videos', 'page', 'meta_title', 'meta_desc'));
            } else {
                return redirect('/');
            }
        } else {
            $videos = Video::paginate(12);
            return view('frontend.video', compact('mainVideo', 'videos', 'page'));
        }

    }

    public function search(Request $request)
    {
        $page = 'search';

        $keyword = urldecode($request->input('q'));

        $posts = Post::where('status', true)
            ->latest('created_at')
            ->where('title', 'LIKE', '%'. $keyword. '%')
            ->paginate(10);

        return view('frontend.search', compact('keyword', 'posts', 'page'));

    }

    public function tag($slug)
    {
        $page = 'tag';

        $tag = Tag::findBySlug($slug);

        if ($tag) {
            $keyword = $tag->name;

            $posts = Post::where('status', true)
                ->latest('created_at')
                ->whereHas('tags', function($q) use ($tag) {
                    $q->where('id', $tag->id);
                })
                ->paginate(10);

            return view('frontend.search', compact('keyword', 'posts', 'page'));
        } else {
            return redirect('/');
        }

    }
}

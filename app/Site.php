<?php

namespace App;

class Site
{
    public static function moduleEnable($key_type, $key_content, $key_value)
    {
        $modules = Module::where('key_type', $key_type)
            ->where('key_content', $key_content)
            ->where('key_value', $key_value)
            ->get();

        return ($modules->count() > 0)? $modules->first() : null;
    }

    public static function getCategories()
    {
        return array(0 => 'Chọn chuyên mục cha') + Category::pluck('name', 'id')->all();
    }

    public static function getNoSubCategories()
    {
        return array(0 => 'Chọn chuyên mục') + Category::doesntHave('subCategories')->pluck('title', 'id')->all();
    }

    public static function getBannerLists()
    {
        return  [
            1 => 'Banner giữa trang chủ',
            2 => 'Banner cuối trang chủ',
            3 => 'Banner giữa cột phải',
            4 => 'Banner giữa trang trong',
            5 => 'Banner cuối trang trong',
            6 => 'Banner V2 trượt bên trái',
            7 => 'Banner V2 cột phải trang trong'
        ];
    }

    /**
     * get list of can be parent categories
     * @return mixed
     */
    public static function getParentCategories()
    {
        return Category::where('parent_id', null)
            ->pluck('name', 'id')
            ->all();
    }

    public static function getAllParentCategories()
    {
        return Category::where('parent_id', null)
            ->get();
    }


    public static function getTags()
    {
        return Tag::all()->pluck('name', 'name')->all();
    }

    public static function getYoutubeEmbedUrl($code)
    {
        $youtube_id = null;
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';

        if (preg_match($longUrlRegex, $code, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $code, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }



    public static function getStatus()
    {
        return array(1 => 'Active', 0 => 'Inactive');
    }

    public static function getOrderStatus()
    {
        return array(1 => 'Đang xử lý', 0 => 'Vừa nhận đặt hàng', 2 => 'Đã xử lý xong');
    }


    public static function getDistricts()
    {
        $districts = District::orderBy('province_id')->get();

        $response = [];

        foreach ($districts as $district) {
            $response[$district->id] = '=='.$district->province->name.'=='.$district->name;
        }

        return $response;
    }

    #Frontend

    public static function getSubCategories($cateSlug)
    {
        return Category::findBySlug($cateSlug);
    }

    public static function getFrontendBanners()
    {
        return Banner::all();
    }

    public static function getIndexCategoryPosts($category, $limit = 4)
    {

        $subCategoryIds = Category::where('parent_id', $category->id)->pluck('id')->all();
        $categoryIds = ($subCategoryIds) ? $subCategoryIds : [$category->id];

        return Post::where('status', true)->latest('created_at')->whereIn('category_id', $categoryIds)->limit($limit)->get();
    }

    public static function getRightIndexVideos()
    {
        $rightIndexModules = Module::where('key_type', 'index_right')->where('key_content', 'videos')->pluck('key_value')->all();
        return Video::latest('created_at')->whereIn('id', $rightIndexModules)->limit(3)->get();
    }

    public static function getRightIndexQuestions()
    {
        $rightIndexModules = Module::where('key_type', 'index_right')->where('key_content', 'questions')->pluck('key_value')->all();
        return Question::latest('created_at')->whereIn('id', $rightIndexModules)->limit(3)->get();
    }

    public static function getRightIndexPosts()
    {
        $rightIndexModules = Module::where('key_type', 'index_right')->where('key_content', 'posts')->pluck('key_value')->all();
        return Post::where('status', true)->latest('created_at')->whereIn('id', $rightIndexModules)->limit(4)->get();
    }

    public static function getIndexSubCategory($category, $limit = 3)
    {
        return Category::where('parent_id', $category->id)->limit($limit)->get();
    }

    public static function getCommentIndex()
    {
        return Comment::where('status', true)->latest('created_at')->limit(4)->get();
    }

    public static function getRightIndexSharePosts()
    {
        $rightIndexModules = Module::where('key_type', 'index_right_share')->where('key_content', 'posts')->pluck('key_value')->all();
        return Post::where('status', true)->latest('created_at')->whereIn('id', $rightIndexModules)->limit(4)->get();
    }

    public static function getLatestNormalPosts()
    {
        return Post::where('status', true)->latest('created_at')->limit(5)->get();
    }

    public static function getListOfProducts()
    {
        return Post::where('status', true)
            ->whereNotNull('content_1')
            ->whereNotNull('content_2')
            ->pluck('title', 'id')
            ->all();
    }




    public static function getLatestIndexPosts()
    {
        return Post::where('status', true)->latest('created_at')->limit(3)->get();
    }

    public static function getLatestQuestions()
    {
        return Question::where('status', true)->latest('created_at')->limit(3)->get();
    }



    public static function getLatestNews($post_id = null)
    {
        if ($post_id) {
            $post = Post::find($post_id);
            $category = $post->category;
        } else {
            $category = Category::findBySlug('tin-tuc');
        }

        if ($category->subCategories->count() == 0) {
            if ($post_id) {
                return Post::where('status', true)
                    ->where('category_id', $category->id)
                    ->where('id', '<>', $post_id)
                    ->latest('created_at')
                    ->limit(3)
                    ->get();
            }
            return Post::where('status', true)
                ->where('category_id', $category->id)
                ->latest('created_at')
                ->limit(3)
                ->get();
        } else {
            if ($post_id) {
                return Post::where('status', true)
                    ->whereIn('category_id', $category->subCategories->pluck('id')->all())
                    ->where('id', '<>', $post_id)
                    ->latest('created_at')
                    ->limit(3)
                    ->get();
            }
            return Post::where('status', true)
                ->whereIn('category_id', $category->subCategories->pluck('id')->all())
                ->latest('created_at')
                ->limit(3)
                ->get();
        }
    }
}
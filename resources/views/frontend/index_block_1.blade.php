@if ($subCategories = ($key_type == 'index_block_1') ? \App\Site::getIndexSubCategory($category) : \App\Site::getIndexSubCategory($category, 2))
<div class="{{($key_type == 'index_block_1') ? 'block-2 pr' : 'block-2 block-3 pr'}}">
    <ul class="tabs rs">
        <li class="tab-1 tab active" data-content="#tab-{{($key_type == 'index_block_1')? '1' : '5'}}">
            <h3 class="rs">
                <a href="javascript:void(0)"
                   title="{{$category->name}}">{{$category->name}}</a>
            </h3>
        </li>
        @foreach ($subCategories as $v => $subCategory)
            <li class="tab-{{$v+2}} tab" data-content="#tab-{{($key_type == 'index_block_1')? $v+2 : $v+6}}">
                <h3 class="rs">
                    <a href="javascript:void(0)"
                       title="{{$subCategory->name}}">{{$subCategory->name}}</a>
                </h3>
            </li>
        @endforeach
    </ul>
    <div class="tab-content">
        @if ($posts = \App\Site::getIndexCategoryPosts($category))
            <div id="tab-{{($key_type == 'index_block_1')? '1' : '5'}}" class="content active">
                @if ($firstPost = $posts->shift())
                    <div class="hot-news">
                        <div class="post">
                            <a href="{{url($firstPost->slug.'.html')}}" class="title">
                                <img src="{{url('files/images', $firstPost->image)}}" alt="" width="301" height="183"></a>
                            <h4><a href="{{url($firstPost->slug.'.html')}}" class="title" title="{{$firstPost->title}}">{{str_limit($firstPost->title, 50)}}</a>
                            </h4>
                            <div class="sumary">{{str_limit($firstPost->desc, 55)}}</div>
                        </div>
                    </div>
                @endif
                <div class="news">
                    @foreach ($posts as $post)
                        <div class="post">
                            <a href="{{url($post->slug.'.html')}}" class="thumbs" style="background-image: url({{url('files/images', $post->image)}})">
                                <img src="{{url('files/images', $post->image)}}" alt="" width="126" height="90">
                            </a>
                            <div class="news-info">
                                <h4><a href="{{url($post->slug.'.html')}}"
                                       class="title"
                                       title="{{$post->title}}">{{str_limit($post->title, 50)}}</a>
                                </h4>
                                <div class="sumary">{{str_limit($post->desc, 55)}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @foreach ($subCategories as $v => $subCategory)
            @if ($posts = \App\Site::getIndexCategoryPosts($subCategory))
                <div id="tab-{{($key_type == 'index_block_1')? $v+2 : $v+6}}" class="content">
                    @if ($firstPost = $posts->shift())
                        <div class="hot-news">
                            <div class="post">
                                <img src="{{url('files/images', $firstPost->image)}}"
                                     alt="" width="301" height="183">
                                <h4><a href="{{url($firstPost->slug.'.html')}}"
                                       class="title"
                                       title="{{$firstPost->title}}"> {{str_limit($firstPost->title, 50)}}</a>
                                </h4>
                                <div class="sumary">{{str_limit($firstPost->desc, 50)}}</div>
                            </div>
                        </div>
                    @endif
                    <div class="news">
                        @foreach ($posts as $post)
                            <div class="post">
                                <a href="{{url($post->slug.'.html')}}" class="thumbs" style="background-image: url({{url('files/images', $post->image)}})">
                                    <img src="{{url('files/images', $post->image)}}" alt="" width="126" height="90">
                                </a>
                                <div class="news-info">
                                    <h4><a href="{{url($post->slug.'.html')}}"
                                           class="title"
                                           title="{{$post->title}}">{{str_limit($post->title, 50)}}</a>
                                    </h4>
                                    <div class="sumary">{{str_limit($post->desc, 65)}}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endif
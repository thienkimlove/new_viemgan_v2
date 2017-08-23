<div class="{{($key_type == 'index_block_3')? 'duoc-lieu': 'cam-nang'}}">
    <h2>{{strtoupper($category->name)}}</h2>
    @if ($posts = \App\Site::getIndexCategoryPosts($category, 3))
        <div class="post">
            @if ($firstPost = $posts->shift())
                <a href="{{url($firstPost->slug.'.html')}}" class="thumbs" style="background-image: url({{url('files/images', $firstPost->image)}})">
                    <img src="{{url('files/images', $firstPost->image)}}" alt="" width="326" height="203">
                </a>
                <h4><a href="{{url($firstPost->slug.'.html')}}" class="title"
                       title="{{$firstPost->title}}">{{str_limit($firstPost->title, 50)}}</a>
                </h4>
                <div class="sumary">{{str_limit($firstPost->desc, 120)}}</div>

                <div class="related-news">
                    @foreach ($posts as $post)
                        <a href="{{url($post->slug.'.html')}}"
                           title="{{$post->title}}">{{str_limit($post->title, 120)}}</a>
                    @endforeach
                </div>
            @endif
        </div>
    @endif
</div>
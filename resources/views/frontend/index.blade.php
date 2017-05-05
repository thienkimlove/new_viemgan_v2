@extends('frontend.template')

@section('content')

    <section class="body pr">
        <div class="fixCen">
            <div class="block-1 banner-post">
                @if ($firstPostInIndexTopPost = $indexTopPosts->shift())
                <div class="banner-big pr">
                    <img src="{{url('img/cache/507x310', $firstPostInIndexTopPost->image)}}" alt="" width="507" height="310">
                    <div class="title">
                        <a href="{{url($firstPostInIndexTopPost->slug.'.html')}}" title="{{$firstPostInIndexTopPost->title}}">
                            {{str_limit($firstPostInIndexTopPost->title, 50)}}
                        </a>
                    </div>
                </div>
                @endif

                @if ($indexTopPosts->count() > 0)
                <div class="group-banner-sm">
                    @foreach ($indexTopPosts  as $indexTopPost)
                        <div class="bn pr">
                            <img src="{{url('img/cache/226x148', $indexTopPost->image)}}" alt="" width="226" height="148">
                            <div class="title">
                                <a href="{{url($indexTopPost->slug.'.html')}}" title="{{$indexTopPost->title}}">
                                    {{str_limit($indexTopPost->title, 50)}}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="groups">
                <div class="left-content">
                    @if ($subIndexParentCategory1 = \App\Site::getIndexSubCategory($indexParentCategory1))
                        <div class="block-2 pr">
                            <ul class="tabs rs">
                                <li class="tab-1 tab active" data-content="#tab-1">
                                    <h3 class="rs">
                                        <a href="javascript:void(0)"
                                           title="{{$indexParentCategory1->name}}">{{$indexParentCategory1->name}}</a>
                                    </h3>
                                </li>
                                @foreach ($subIndexParentCategory1 as $v => $subCategory)
                                    <li class="tab-{{$v+2}} tab" data-content="#tab-{{$v+2}}">
                                        <h3 class="rs">
                                            <a href="javascript:void(0)"
                                               title="{{$subCategory->name}}">{{$subCategory->name}}</a>
                                        </h3>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @if ($indexParentCatePosts = \App\Site::getIndexCategoryPosts($indexParentCategory1))
                                    <div id="tab-1" class="content active">
                                        @if ($firstIndexParentCatePost = $indexParentCatePosts->shift())
                                            <div class="hot-news">
                                                <div class="post">
                                                    <img src="{{url('img/cache/301x183', $firstIndexParentCatePost->image)}}"
                                                         alt="" width="301" height="183">
                                                    <h4><a href="{{url($firstIndexParentCatePost->slug.'.html')}}"
                                                           class="title"
                                                           title="{{$firstIndexParentCatePost->title}}">{{str_limit($firstIndexParentCatePost->title, 50)}}</a>
                                                    </h4>
                                                    <div class="sumary">{{str_limit($firstIndexParentCatePost->desc, 150)}}</div>
                                                </div>
                                            </div>
                                        @endif
                                            <div class="news">
                                                @foreach ($indexParentCatePosts as $indexParentCatePost)

                                                        <div class="post">
                                                            <img src="{{url('img/cache/126x90', $indexParentCatePost->image)}}"
                                                                 alt="" width="126" height="90">
                                                            <div class="news-info">
                                                                <h4><a href="{{url($indexParentCatePost->slug.'.html')}}"
                                                                       class="title"
                                                                       title="{{$indexParentCatePost->title}}">{{str_limit($indexParentCatePost->title, 50)}}</a>
                                                                </h4>
                                                                <div class="sumary">{{str_limit($indexParentCatePost->desc, 150)}}</div>
                                                            </div>
                                                        </div>

                                                @endforeach
                                            </div>
                                    </div>
                                @endif
                                @foreach ($subIndexParentCategory1 as $v => $subCategory)
                                    @if ($indexCatePosts = \App\Site::getIndexCategoryPosts($subCategory))
                                        <div id="tab-{{$v+2}}" class="content">
                                            @if ($firstIndexCatePost = $indexCatePosts->shift())
                                                <div class="hot-news">
                                                    <div class="post">
                                                        <img src="{{url('img/cache/301x183', $firstIndexCatePost->image)}}"
                                                             alt="" width="301" height="183">
                                                        <h4><a href="{{url($firstIndexCatePost->slug.'.html')}}"
                                                               class="title"
                                                               title="{{$firstIndexCatePost->title}}"> {{str_limit($firstIndexCatePost->title, 50)}}</a>
                                                        </h4>
                                                        <div class="sumary">{{str_limit($firstIndexCatePost->desc, 150)}}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="news">
                                                @foreach ($indexCatePosts as $indexCatePost)

                                                        <div class="post">
                                                            <img src="{{url('img/cache/126x90', $indexCatePost->image)}}"
                                                                 alt="" width="126" height="90">
                                                            <div class="news-info">
                                                                <h4><a href="{{url($indexCatePost->slug.'.html')}}"
                                                                       class="title"
                                                                       title="{{$indexCatePost->title}}">{{str_limit($indexCatePost->title, 50)}}</a>
                                                                </h4>
                                                                <div class="sumary">{{str_limit($indexCatePost->desc, 150)}}</div>
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
                    @if ($subIndexParentCategory2 = \App\Site::getIndexSubCategory($indexParentCategory2, 2))
                        <div class="block-2 block-3 pr">
                            <ul class="tabs rs">
                                <li class="tab-1 tab active" data-content="#tab-5"><h3 class="rs"><a
                                                href="javascript:void(0)"
                                                title="{{$indexParentCategory2->name}}">{{$indexParentCategory2->name}}</a>
                                    </h3></li>
                                @foreach ($subIndexParentCategory2 as $v => $subCategory)
                                    <li class="tab-{{$v+2}} tab" data-content="#tab-{{$v+6}}"><h3 class="rs"><a
                                                    href="javascript:void(0)"
                                                    title="{{$subCategory->name}}">{{$subCategory->name}}</a></h3></li>
                                @endforeach

                            </ul>
                            <div class="tab-content">
                                @if ($indexParentCatePosts = \App\Site::getIndexCategoryPosts($indexParentCategory2))
                                    <div id="tab-5" class="content active">
                                        @if ($firstIndexParentCatePost = $indexParentCatePosts->shift())
                                            <div class="hot-news">
                                                <div class="post">
                                                    <img src="{{url('img/cache/301x183', $firstIndexParentCatePost->image)}}"
                                                         alt="" width="301" height="183">
                                                    <h4><a href="{{url($firstIndexParentCatePost->slug.'.html')}}"
                                                           class="title"
                                                           title="{{$firstIndexParentCatePost->title}}">{{str_limit($firstIndexParentCatePost->title, 50)}}</a>
                                                    </h4>
                                                    <div class="sumary">{{str_limit($firstIndexParentCatePost->desc, 150)}}</div>
                                                </div>
                                            </div>
                                        @endif
                                            <div class="news">
                                        @foreach ($indexParentCatePosts as $indexParentCatePost)

                                                <div class="post">
                                                    <img src="{{url('img/cache/126x90', $indexParentCatePost->image)}}"
                                                         alt="" width="126" height="90">
                                                    <div class="news-info">
                                                        <h4><a href="{{url($indexParentCatePost->slug.'.html')}}"
                                                               class="title"
                                                               title="{{$indexParentCatePost->title}}">{{str_limit($indexParentCatePost->title, 50)}}</a>
                                                        </h4>
                                                        <div class="sumary">{{str_limit($indexParentCatePost->desc, 150)}}</div>
                                                    </div>
                                                </div>

                                        @endforeach
                                            </div>
                                    </div>
                                @endif
                                @foreach ($subIndexParentCategory2 as $v => $subCategory)
                                    @if ($indexCatePosts = \App\Site::getIndexCategoryPosts($subCategory))
                                        <div id="tab-{{$v+6}}" class="content">
                                            @if ($firstIndexCatePost = $indexCatePosts->shift())
                                                <div class="hot-news">
                                                    <div class="post">
                                                        <img src="{{url('img/cache/301x183', $firstIndexCatePost->image)}}"
                                                             alt="" width="301" height="183">
                                                        <h4><a href="{{url($firstIndexCatePost->slug.'.html')}}"
                                                               class="title"
                                                               title="{{$firstIndexCatePost->title}}">{{str_limit($firstIndexCatePost->title, 50)}}</a>
                                                        </h4>
                                                        <div class="sumary">{{str_limit($firstIndexCatePost->desc, 150)}}</div>
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="news">
                                                @foreach ($indexCatePosts as $indexCatePost)

                                                        <div class="post">
                                                            <img src="{{url('img/cache/126x90', $indexCatePost->image)}}"
                                                                 alt="" width="126" height="90">
                                                            <div class="news-info">
                                                                <h4><a href="{{url($indexCatePost->slug.'.html')}}"
                                                                       class="title"
                                                                       title="{{$indexCatePost->title}}">{{str_limit($indexCatePost->title, 50)}}</a>
                                                                </h4>
                                                                <div class="sumary">{{str_limit($indexCatePost->desc, 150)}}</div>
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
                    <div class="block-4">
                        @if ($indexParentCategory3)
                            <div class="duoc-lieu">
                                <h2>{{strtoupper($indexParentCategory3->name)}}</h2>
                                @if ($index3Posts = \App\Site::getIndexCategoryPosts($indexParentCategory3, 3))
                                    <div class="post">
                                        @if ($firstIndex3Post = $index3Posts->shift())
                                            <img src="{{url('img/cache/326x203', $firstIndex3Post->image)}}" alt=""
                                                 width="326" height="203">
                                            <h4><a href="{{url($firstIndex3Post->slug.'.html')}}" class="title"
                                                   title="{{$firstIndex3Post->title}}">{{str_limit($firstIndex3Post->title, 50)}}</a>
                                            </h4>
                                            <div class="sumary">{{str_limit($firstIndex3Post->desc, 150)}}</div>

                                            <div class="related-news">
                                                @foreach ($index3Posts as $index3Post)
                                                    <a href="{{url($index3Post->slug.'.html')}}"
                                                       title="{{$index3Post->title}}">{{str_limit($index3Post->title, 150)}}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                        @if ($indexParentCategory4)
                            <div class="cam-nang">
                                <h2>{{strtoupper($indexParentCategory4->name)}}</h2>
                                @if ($index3Posts = \App\Site::getIndexCategoryPosts($indexParentCategory4, 3))
                                    <div class="post">
                                        @if ($firstIndex3Post = $index3Posts->shift())
                                            <img src="{{url('img/cache/326x203', $firstIndex3Post->image)}}" alt=""
                                                 width="326" height="203">
                                            <h4><a href="{{url($firstIndex3Post->slug.'.html')}}" class="title"
                                                   title="{{$firstIndex3Post->title}}">{{str_limit($firstIndex3Post->title, 50)}}</a>
                                            </h4>
                                            <div class="sumary">{{str_limit($firstIndex3Post->desc, 150)}}</div>

                                            <div class="related-news">
                                                @foreach ($index3Posts as $index3Post)
                                                    <a href="{{url($index3Post->slug.'.html')}}"
                                                       title="{{$index3Post->title}}">{{str_limit($index3Post->title, 50)}}</a>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
                @include('frontend.right_content')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
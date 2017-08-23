@extends('frontend.template')

@section('content')

    <section class="body pr">
        <div class="fixCen">
            <div class="block-1 banner-post">
                @if ($firstPost = $indexTopPosts->shift())
                <div class="banner-big pr">
                    <a href="{{url($firstPost->slug.'.html')}}" title="{{$firstPost->title}}" class="thumbs" style="background-image: url({{url('files/images', $firstPost->image)}})">
                        <img src="{{url('files/images', $firstPost->image)}}" alt="" width="507" height="310"></a>
                    <div class="title">
                        <a href="{{url($firstPost->slug.'.html')}}" title="{{$firstPost->title}}">
                            {{str_limit($firstPost->title, 50)}}
                        </a>
                    </div>
                </div>
                @endif

                @if ($indexTopPosts->count() > 0)
                <div class="group-banner-sm">
                    @foreach ($indexTopPosts  as $indexTopPost)
                        <div class="bn pr">
                            <a href="{{url($indexTopPost->slug.'.html')}}" title="{{$indexTopPost->title}}" class="thumbs" style="background-image: url({{url('files/images', $indexTopPost->image)}})">
                                <img src="{{url('files/images', $indexTopPost->image)}}" alt="" width="226" height="148"></a>
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
                    @foreach (['index_block_1', 'index_block_2'] as $keyType)
                        @include('frontend.index_block_1', [
                        'category' => $indexCategories->where('key_type', $keyType)->first(),
                        'key_type' => $keyType
                        ])
                    @endforeach

                        <div class="ads">
                            @foreach (\App\Site::getFrontendBanners()->where('position', 1) as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files/images', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>

                    <div class="block-4">
                        @foreach (['index_block_3', 'index_block_4'] as $keyType)
                            @include('frontend.index_block_2', [
                            'category' => $indexCategories->where('key_type', $keyType)->first(),
                             'key_type' => $keyType
                             ])

                        @endforeach
                    </div>
                </div>
                @include('frontend.right_content')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
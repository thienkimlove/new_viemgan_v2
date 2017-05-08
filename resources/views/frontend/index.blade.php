@extends('frontend.template')

@section('content')

    <section class="body pr">
        <div class="fixCen">
            <div class="block-1 banner-post">
                @if ($firstPost = $indexTopPosts->shift())
                <div class="banner-big pr">
                    <img src="{{url('files/images', $firstPost->image)}}" alt="" width="507" height="310">
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
                            <img src="{{url('files/images', $indexTopPost->image)}}" alt="" width="226" height="148">
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
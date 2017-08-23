@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs">Tìm kiếm theo từ khóa {{$keyword}}</h3>
                    </div>
                    <div class="list-news">
                        <div class="news">
                            @foreach ($posts as $post)
                                <div class="post post-news">
                                <a href="{{url($post->slug.'.html')}}" title="{{$post->title}}" class="img-title thumbs" style="background-image: url({{url('files/images', $post->image)}})">
                                    <img src="{{url('files/images', $post->image)}}" alt="" width="276" height="157">
                                </a>
                                <div class="right">
                                    <a href="{{url($post->slug.'.html')}}" class="title" title="{{$post->title}}">
                                        {{$post->title}}
                                    </a>
                                    <div class="sumary">
                                        {{$post->desc}}
                                    </div>
                                    <a href="{{url($post->slug.'.html')}}" class="view-detail" title="Xem chi tiết">Xem chi tiết >></a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @include('frontend.pagination', ['paginate' => $posts])
                        @include('frontend.list_button')
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
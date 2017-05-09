@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('chuyen-muc', $post->category->slug)}}" title="{{$post->category->name}}">{{$post->category->name}}</a></h3>
                        <span>|</span>
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="detail-content">
                        <article class="detail">
                            <span class="detail-title">{{$post->title}}</span>
                            <div class="detail-tab-content">
                                <div class="content">
                                    <article>
                                      {!! $post->content !!}
                                    </article>
                                </div>
                            </div>
                        </article>
                        @include('frontend.list_button')
                        <div class="ads">
                            @foreach (\App\Site::getFrontendBanners()->where('position', 2) as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files/images', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($post->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="news-bt">
                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#"> TIN LIÊN QUAN</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach ($post->related_posts as $post)
                                        <div class="item cf item-r">
                                            <h3>
                                                <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#">TIN MỚI</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach (\App\Site::getLatestNormalPosts() as $post)
                                        <div class="item cf item-r">
                                            <h3>
                                                <a href="{{url($post->slug.'.html')}}">{{$post->title}}</a>
                                            </h3>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="social-bt">
                            <div class='fb-like' data-action='like' data-href='{{url('hoi-dap', $post->slug)}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>
                        </div>
                        <div class="comment-post">
                            <div class="fb-comments" data-href="{{url('hoi-dap', $post->slug)}}" data-numposts="2" data-width="100%"></div>
                        </div>
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
       @include('frontend.exp')
    </section>
@endsection
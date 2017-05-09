@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('chuyen-muc', $post->category->slug)}}" title="Video">{{$post->category->name}}</a></h3>
                        <span>|</span>
                        <h4>{{$post->title}}</h4>
                    </div>
                    <div class="detail-content">
                        <article class="detail">
                            <span class="detail-title">{{$post->title}}</span>
                            <ul class="tabs detail-tabs rs">
                                <li class="tab-1 tab active" data-content="#tab-8"><h3 class="rs"><a href="javascript:void(0)" title="Thông tin sản phẩm">THÔNG TIN SẢN PHẨM</a></h3></li>
                                <li class="tab-2 tab" data-content="#tab-9"><h3 class="rs"><a href="javascript:void(0)" title="Bằng chứng khoa học">bằng chứng khoa học</a></h3></li>
                                <li class="tab-3 tab" data-content="#tab-10"><h3 class="rs"><a href="javascript:void(0)" title="Cảm nhận khách hàng">cảm nhận khách hàng</a></h3></li>
                            </ul>
                            <div class="tab-content detail-tab-content">
                                <div id="tab-8" class="content active">
                                    <article>
                                        {!! $post->content !!}
                                    </article>
                                </div>
                                <div id="tab-9" class="content">
                                    <article>
                                        {!! $post->content_1 !!}
                                    </article>
                                </div>
                                <div id="tab-10" class="content">
                                    <article>
                                        {!! $post->content_2 !!}
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
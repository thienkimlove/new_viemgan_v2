@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('hoi-dap')}}" title="Hỏi đáp">Hỏi đáp</a></h3>
                        <span>|</span>
                        <h4>{{$question->title}}</h4>
                    </div>
                    <div class="box-faq-detail">
                        <article class="detail">
                            <h3 class="title-faq">{{$question->title}}</h3>
                            <div class="content">
                                <p>
                                   {{$question->question}}
                                </p>
                                <div class="answer">Trả lời</div>
                                <div class="answer-faq">
                                   {{$question->answer}}
                                </div>
                            </div>
                        </article>
                        @include('frontend.list_button')
                        <div class="ads">
                            @foreach (\App\Site::getFrontendBanners()->where('position', 4) as $banner)
                                <a href="{{$banner->link}}" title="Banner" target="_blank">
                                    <img src="{{url('files/images', $banner->image)}}" alt="" class="imgFull" width="658" height="136">
                                </a>
                            @endforeach
                        </div>
                        <div class="box-tags">
                            <span>Từ khóa: </span>
                            @foreach ($question->tags as $tag)
                                <a href="{{url('tu-khoa', $tag->slug)}}" title="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <div class="news-bt">
                            <div class="box-usual-ques">
                                <h3 class="global-title">
                                    <a href="#"> TIN LIÊN QUAN</a>
                                </h3>
                                <div class="box-bd">
                                    @foreach ($question->related_posts as $post)
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
                            <div class='fb-like' data-action='like' data-href='{{url('hoi-dap', $question->slug)}}' data-layout='button_count' data-share='true' data-show-faces='false' data-width='520'></div>
                        </div>
                        <div class="comment-post">
                            <div class="fb-comments" data-href="{{url('hoi-dap', $question->slug)}}" data-numposts="2" data-width="100%"></div>
                        </div>
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
<div class="right-content pr">
    <div class="most-readed on-top">
        <h3 class="global-title">
            <a href="#">BÀI VIẾT NỔI BẬT</a>
        </h3>
        <div class="box-bd boxHot">
            @foreach (\App\Site::getRightIndexPosts() as $rightIndexPost)
                <div class="item cf">
                <a href="{{url($rightIndexPost->slug.'.html')}}" class="thumb">
                    <img src="{{url('files/images', $rightIndexPost->image)}}" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="{{url($rightIndexPost->slug.'.html')}}">{{$rightIndexPost->title}}</a>
                </h4>
            </div>
            @endforeach
        </div>
    </div>
    <div class="box-adv">
        <a href="tel:18001190">
            <img src="{{url('viemgan/images/tu-van-2.png')}}" alt="Tư vấn miễn phí" width="317" height="76">
        </a>
    </div>
    <div class="box-adv">
        <a href="{{url('phan-phoi')}}">
            <img src="{{url('viemgan/images/diem-ban-2.png')}}" alt="Điểm bán sản phẩm" width="317" height="76">
        </a>
    </div>
    @if ($rightVideos = \App\Site::getRightIndexVideos())
    <div class="box-video">
        <h3 class="global-title">
            <a href="{{url('video')}}">Góc video</a>
        </h3>
        <div class="box-bd video-group">
            @if ($firstRightVideo = $rightVideos->shift())
                <div class="data">
                    <iframe width="100%" height="250" src="{{\App\Site::getYoutubeEmbedUrl($firstRightVideo->code)}}" frameborder="0" allowfullscreen></iframe>
                    <h3>
                        {{$firstRightVideo->title}}
                    </h3>
                </div>
            @endif
            @foreach ($rightVideos as $rightVideo)
                <div class="item cf item-r">
                    <h3>
                        <a href="{{url('video', $rightVideo->slug)}}">{{$rightVideo->title}}</a>
                    </h3>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    @if ($rightQuestions = \App\Site::getRightIndexQuestions())
    <div class="box-usual-ques">
        <h3 class="global-title">
            <a href="{{url('hoi-dap')}}"> CÂU HỎI THƯỜNG GẶP</a>
        </h3>
        <div class="box-bd">
            @foreach ($rightQuestions as $question)
                <div class="item cf item-r">
                <h3>
                    <a href="{{url('hoi-dap', $question->slug)}}">{{$question->title}}</a>
                </h3>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <div class="box-adv">
        @foreach (\App\Site::getFrontendBanners()->where('position', 4) as $banner)
        <a href="{{$banner->link}}" title="Banner" target="_blank">
            <img src="{{url('files/images', $banner->image)}}" alt="" class="imgFull" width="315" height="202">
        </a>
        @endforeach
    </div>
    <div class="form-question-right">
        <h3 class="global-title">
            <a href="#">GỬI CÂU HỎI</a>
        </h3>
        <div class="box-bd">
            <form action="{{url('saveContact')}}" method="post">
                <input type="text" name="name" class="txt txt-name" placeholder="Họ và tên"/>
                <input type="number" name="phone" class="txt txt-phone" placeholder="Số điện thoại"/>
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <input type="email" name="email" class="txt txt-email" placeholder="Email"/>
                <textarea name="content" class="txt txt-content" placeholder="Câu hỏi"></textarea>
                <div class="btn-groups">
                    <input type="submit" value="Gửi" class="btn btn-submit"/>
                    <input type="reset" value="Hủy" class="btn btn-reset"/>
                </div>
            </form>
        </div>
    </div>
    <div class="Social">
        <div class="fb-page" data-href="https://www.facebook.com/viemgan.com.vn" data-width="300" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/viemgan.com.vn"><a href="https://www.facebook.com/viemgan.com.vn">Phòng Bệnh Gan</a></blockquote></div></div>
    </div>
    <div class="most-readed share-exp" id="sidebar">
        <h3 class="global-title">
            <a href="#">Chia sẻ của người dùng</a>
        </h3>
        <div class="box-bd boxHot">
            @foreach (\App\Site::getRightIndexSharePosts() as $rightIndexSharePost)
            <div class="item cf">
                <a href="{{url($rightIndexSharePost->slug.'.html')}}" class="thumb">
                    <img src="{{url('files/images', $rightIndexSharePost->image)}}" alt="hot" width="120" height="84">
                </a>
                <h4>
                    <a href="{{url($rightIndexSharePost->slug.'.html')}}">{{$rightIndexSharePost->title}}</a>
                </h4>
            </div>
            @endforeach

        </div>
    </div>
</div>
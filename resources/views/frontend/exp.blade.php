<div class="experience">
    <div class="fixCen">
        <h2 class="rs no-extend">KINH NGHIỆM PHÒNG VÀ CHỮA BỆNH GAN</h2>
        <h2 class="rs extend">CHIA SẺ NGAY CÂU CHUYỆN CỦA BẠN</h2>
        <div id="slider-2">
            @foreach (\App\Site::getCommentIndex() as $comment)
                <div class="item">
                <div class="left">
                    <img src="{{url('img/cache/114x114', $comment->image)}}" class="avatar" alt="Tên người" width="114" height="114">
                </div>
                <div class="right">
                    <div class="title">{{$comment->title}}</div>
                    <div class="name">{{$comment->name}}</div>
                    <div class="address">{{$comment->address}}</div>
                </div>
                <div class="bottom">
                    {!! $comment->comment !!}
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
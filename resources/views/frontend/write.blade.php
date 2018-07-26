@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{ url('/') }}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{ url('dang-bai-viet') }}" title="Đăng bài viết">Đăng bài viết</a></h3>
                    </div>
                    <div class="article-content">
                        <p>Bạn muốn chia sẻ về thông tin, tình trạng bệnh hoặc muốn đặt câu hỏi về bệnh. Vui lòng đăng bài viết</p>
                        <a href="javascript:void(0)" class="links link-post" title="Đăng bài viết">Đăng bài viết</a>
                        <div class="box-hide">
                            Bạn cần Đăng ký để gửi bài viết mới
                            <div class="btns">
                                <a href="javascript:void(0)" class="links link-regis" title="Đăng ký">Đăng ký</a> |
                                <a href="javascript:void(0)" class="links link-login" title="Đăng nhập">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection

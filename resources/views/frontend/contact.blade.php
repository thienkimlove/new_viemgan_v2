@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('lien-he')}}" title="Liên hệ">Liên hệ</a></h3>
                    </div>
                    <div class="contact-content">
                        @include('frontend.form_get_phone', ['is_full' => true])
                        <div class="address-group">
                            <strong>Tại Hà Nội</strong><br>
                            Tầng 5, tòa nhà 29T1, phố Hoàng Đạo Thúy, Trung Hòa, Cầu Giấy, Hà Nội. <br>
                            Điện thoại: (04) 62824263 <br>
                            Fax: 0426824263 <br> <br>
                            <strong>Chi nhánh Hồ Chí Mình</strong> <br>
                            156/17 Tô Hiến Thành - P15 - Quận 10, TP.HCM <br>
                            Điện thoại: (083) 9797779 <br>
                            Fax: 0862648632 <br>
                            Đường dây nóng: 0912571190
                        </div>
                        <div class="embed-ggmap">
                            <img src="{{url('viemgan/images/gg-map.jpg')}}" alt="" class="imgFull" width="728" height="425">
                        </div>
                    </div>
                    @include('frontend.list_button')
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection

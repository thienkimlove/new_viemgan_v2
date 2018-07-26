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
                            Trung Hòa, Cầu Giấy, Hà Nội. <br>
                            Điện thoại: (04) <br>
                            Fax: 042 <br> <br>
                            <strong>Chi nhánh Hồ Chí Mình</strong> <br>
                            156/17 Tô Hiến Thành - P15 - Quận 10, TP.HCM <br>
                            Điện thoại: (083)  <br>
                            Fax: 08 <br>
                            Đường dây nóng: 
                        </div>
                        <div class="embed-ggmap">
                            <img src="{{url('viemgan/images/ggmap.jpg')}}" alt="" class="imgFull" width="728" height="425">
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

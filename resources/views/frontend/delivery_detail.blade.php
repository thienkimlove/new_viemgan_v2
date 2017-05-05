@extends('frontend.template')

@section('content')
    <section class="body pr">
        <div class="fixCen">
            <div class="groups">
                <div class="left-content">
                    <div class="steps">
                        <h2 class="rs"><a href="{{url('/')}}" title="Trang chủ">Trang chủ</a></h2>
                        <span>|</span>
                        <h3 class="rs"><a href="{{url('phan-phoi')}}" title="Phân phối">Phân phối</a></h3>
                        <span>|</span>
                        <h4>{{config('delivery')['area'][$delivery->area]}}</h4>
                        <span>|</span>
                        <h5>{{config('delivery')['city'][$delivery->city]}}</h5>
                    </div>
                    <div class="delivery-detail">
                        <h3 class="note-pp-chitiet">
                            Danh sách đại lý, nhà thuốc phân phối tại <span class="district">{{config('delivery')['city'][$delivery->city]}}</span> <br>
                            Để mua sản phẩm tại các tỉnh thành khác, vui lòng click: <a href="{{url('phan-phoi')}}" title="Điểm bán hàng toàn quốc">ĐIỂM BÁN HÀNG TOÀN QUỐC</a>
                            <br>
                            Các nhà thuốc được in đậm là các nhà thuốc chắc chắn còn hàng. Nếu không tìm thấy điểm bán hàng thuận tiện, hãy gọi đến Hotline (miễn cước)
                            1900 4682 để được hướng dẫn hoặc muốn mua hàng online thì xem <a href="#" title="Đặt hàng online">" TẠI ĐÂY "</a>
                        </h3>
                        <div class="pp-chitiet-content">
                           {!! $delivery->content !!}
                        </div>
                        @include('frontend.list_button')
                    </div>
                </div>
                @include('frontend.right_normal')
            </div>
        </div>
        @include('frontend.exp')
    </section>
@endsection
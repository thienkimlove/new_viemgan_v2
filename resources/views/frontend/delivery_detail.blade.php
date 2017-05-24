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
                        <h4>{{$province->domain}}</h4>
                        <span>|</span>
                        <h5>{{$province->name}}</h5>
                    </div>
                    <div class="delivery-detail">
                        <h3 class="note-pp-chitiet">
                            Danh sách đại lý, nhà thuốc phân phối tại <span class="district">{{$province->name}}</span> <br>
                            Để mua sản phẩm tại các tỉnh thành khác, vui lòng click: <a href="{{url('phan-phoi')}}" title="Điểm bán hàng toàn quốc">ĐIỂM BÁN HÀNG TOÀN QUỐC</a>
                            <br>
                            Các nhà thuốc được in đậm là các nhà thuốc chắc chắn còn hàng. Nếu không tìm thấy điểm bán hàng thuận tiện, hãy gọi đến Hotline (miễn cước)
                            1800 1190 để được hướng dẫn hoặc muốn mua hàng online thì xem <a href="http://www.viemgan.com.vn/phan-phoi" title="Đặt hàng online">" TẠI ĐÂY "</a>
                        </h3>
                        <div class="pp-chitiet-content">

                            <div class="title">
                                <a href="{{url('phan-phoi')}}" title="Điểm bán hàng">ĐIỂM BÁN HÀNG</a> <br>
                                <span>Mời Quý khách chọn Quận/ Huyện để xem điểm bán Giải Độc Gan</span>
                            </div>
                            <div class="choose-dis">
                                <select name="district_id" id="district_id">
                                    <option value="">Chọn Quận/ Huyện</option>
                                    @foreach ($province->districts as $district)
                                        <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="show-name-store" id="show_store">

                            </div>
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

@section('frontend_script')
    <script>
        function getStore() {
            var  district_id = $('#district_id').val();
            $('#show_store').html('');
            if (district_id) {
                $.get( Config.url +'/ajax_store', { 'district_id' : district_id }, function(res){
                    $('#show_store').html(res.html);
                });
            }
        }
        $(function(){
            getStore();
            $('#district_id').change(function(){
                getStore();
                return false;
            });
        });
    </script>
@endsection
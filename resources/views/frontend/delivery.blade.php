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
                    </div>
                    <div class="delivery">
                        <h3 class="note-pp">
                            Để mua đúng sản phẩm chính hãng, Quý khách có thể thực hiện một trong những cách sau:
                        </h3>
                        <div class="note1 note">
                            <div class="title">
                                <span class="number">1</span>
                                Điền thông tin đặt hàng online - giao hàng, thu tiền tại nhà <a href="#">[ ĐẶT HÀNG NGAY ]</a>
                            </div>
                            <form action="{{url('saveOrder')}}" id="order_online" method="POST">
                                <div class="row1">
                                    <input type="text" id="name" name="name" placeholder="Họ tên">
                                    <input type="text" id="address" name="address" placeholder="Địa chỉ">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                </div>
                                <div class="row2">
                                    <input type="number" id="phone" name="phone" placeholder="Điện thoại">
                                    <select name="product_id" id="product_id">
                                        <option>Chọn sản phẩm</option>
                                        @foreach (\App\Site::getListOfProducts() as $id => $product)
                                            <option value="{{$id}}">{{$product}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row3">
                                    <input type="text" id="note" name="note" placeholder="Ghi chú">
                                    <input type="number" id="quantity" name="quantity" placeholder="Số lượng" class="sl-onl"> <label for="">hộp</label>
                                    <button id="delivery_form_submit" class="btn-order-onl">ĐẶT MUA HÀNG</button>
                                </div>
                                <div class="error" id="delivery_form_message" style="display: none">Điền đầy đủ các thông tin</div>
                            </form>
                        </div>
                        <div class="note2 note">
                            <div class="title">
                                <span class="number">2</span>
                                Gọi tới tổng đài tư vấn và chăm sóc khách hàng <a href="tel:19006482">1900 6482</a> - <a href="tel:0912571190">0912 571 190</a>
                            </div>
                        </div>
                        <div class="note3 note">
                            <div class="title">
                                <span class="number">3</span>
                                Hoặc mua tại các nhà thuốc trên toàn quốc
                            </div>
                        </div>
                        <div class="places">
                            @foreach ($totalDeliveries as $area => $cities)
                                <div class="places1">
                                    <span class="captain">{{$area}}</span>
                                    <div class="provines">
                                        @foreach ($cities->chunk(6) as $partCities)
                                            @foreach ($partCities as $city)
                                                <a href="{{url('phan-phoi/'. $city->id)}}" title="">{{config('delivery')['city'][$city->city]}}</a>
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
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
        $(function(){
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();

                var name = $('#name').val();
                var address = $('#address').val();
                var phone = $('#phone').val();
                var product_id = $('#product_id').val();
                var quantity = $('#quantity').val();

                if (!name || !address || !phone || !product_id || !quantity) {
                    $('#delivery_form_message').show();
                } else {
                    $('#order_online').submit();
                }

                return false;
            });
        });
    </script>
@endsection
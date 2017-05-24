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
                                Điền vào form thông tin đặt hàng online - giao hàng và thu tiền tại nhà dưới đây .
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
                                    <input type="hidden" name="redirect_url" value="{{request()->fullUrl()}}" />
                                    <input type="text" id="note" name="note" placeholder="Ghi chú">
                                    <input type="number" id="quantity" name="quantity" placeholder="Số lượng" class="sl-onl"> <label for="">hộp</label>
                                    <button id="delivery_form_submit" class="btn-order-onl">ĐẶT MUA HÀNG</button>
                                </div>

                                @if (isset($success_delivery_form_message) && $success_delivery_form_message)
                                    <div class="error" id="delivery_form_message">Chúng tôi sẽ liên hệ lại với bạn</div>
                                @else
                                    <div class="error" id="delivery_form_message" style="display: none"></div>
                                @endif

                            </form>
                        </div>
                        <div class="note2 note">
                            <div class="title">
                                <span class="number">2</span>
                                Gọi tới tổng đài tư vấn và chăm sóc KH: <a href="tel:18001190">1800 1190 </a> (miễn phí cước gọi) - <a href="tel:0912571190">0912 571 190</a>
                            </div>
                        </div>
                        <div class="note3 note">
                            <div class="title">
                                <span class="number">3</span>
                                Hoặc mua tại các nhà thuốc trên toàn quốc
                            </div>
                        </div>
                        <div class="places">
                            @foreach ($provinces->groupBy('domain') as $key => $values)
                                <div class="places1">
                                    <span class="captain">{{$key}}</span>
                                    <div class="provines">
                                        @foreach ($values->chunk(6) as $partProvinces)
                                            @foreach ($partProvinces as $partProvince)
                                                <a href="{{url('phan-phoi', $partProvince->slug)}}" title="">{{$partProvince->name}}</a>
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
                    $('#delivery_form_message').html('Điền đầy đủ các thông tin').show();
                } else {
                    $('#order_online').submit();
                }

                return false;
            });
        });
    </script>
<!-- Google Code for T&igrave;m mua h&agrave;ng Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 964027423;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "S5loCPGLxHEQn8jXywM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/964027423/?label=S5loCPGLxHEQn8jXywM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

@endsection
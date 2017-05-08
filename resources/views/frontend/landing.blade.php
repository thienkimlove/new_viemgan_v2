<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Viemgan.com.vn | Landing</title>
    <link rel="stylesheet" href="{{url('landing/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('landing/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('landing/css/common.css')}}">
</head>
<body>
<div class="wrapper home pr">
    <header class="pr">
        <div class="bg-top">
            <a href="javascript:void(0)" class="miniMenu-btn pa open-main-nav" data-menu="#main-nav"></a>
        </div>
        <div class="fixCen head-info">
            <h1 class="rs"><a href="{{url('/')}}" class="logo" title="Viêm gan" target="_blank">
                    <img src="{{url('viemgan/images/logo.png')}}" alt="Viêm gan" width="170" height="99" class="imgFull">
                </a></h1>
            <span class="slogan">
                    CỔNG THÔNG TIN VỀ BỆNH VIÊM GAN - XƠ GAN
                    <i class="small">BẢO TRỢ BỞI HỘI GAN MẬT VIỆT NAM</i>
                </span>
            <div class="icon-header">
                <img src="{{url('viemgan/images/icon.png')}}" alt="" class="imgFull" width="67" height="71">
            </div>
            <span class="hotline" id="hotline">
                    <a href="tel:19006639">
                        <img src="{{url('viemgan/images/hotline.png')}}" alt="" width="166" height="56" class="imgFull">
                    </a>
                    <form action="{{url('tim-kiem')}}" method="GET" class="search-on-top">
                        <input type="text" name="q" placeholder="Tìm kiếm">
                    </form>
                </span>
        </div>
        <nav id="main-nav" class="menu-mb">
            <ul class="fixCen pr rs">
                <li><a class="{{(isset($page) && $page == 'index')? 'active' : ''}}" href="{{url('/')}}" title="Trang chủ">
                        Home
                    </a></li>
                @foreach (\App\Site::getAllParentCategories() as $parentCategory)
                    @if ($parentCategory->subCategories->count() > 0)
                        <li class="parentMenu">
                            <a href="{{url('chuyen-muc', $parentCategory->slug)}}" title="{{$parentCategory->name}}" class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a>
                            <ul class="submenu">
                                @foreach ($parentCategory->subCategories as $subCategory)
                                    <li><a href="{{url('chuyen-muc', $subCategory->slug)}}" title="{{$subCategory->name}}">{{$subCategory->name}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li><a href="{{url('chuyen-muc', $parentCategory->slug)}}" title="{{$parentCategory->name}}" class="{{(isset($page) && $page == $parentCategory->slug) ? 'active' : ''}}">{{$parentCategory->name}}</a></li>
                    @endif
                @endforeach

                <li><a class="{{(isset($page) && $page == 'hoi-dap') ? 'active' : ''}}" href="{{url('hoi-dap')}}" title="Hỏi đáp">Hỏi đáp</a></li>
                <li><a class="{{(isset($page) && $page == 'video')? 'active' : ''}}" href="{{url('video')}}" title="Video">Video</a></li>
                <li><a class="{{(isset($page) && $page == 'phan-phoi')? 'active' : ''}}" href="{{url('phan-phoi')}}" title="Phân phối">Phân phối</a></li>
                <li><a class="{{(isset($page) && $page == 'lien-he')? 'active' : ''}}" href="{{url('lien-he')}}" title="Liên hệ">Liên hệ</a></li>
            </ul>
        </nav>
    </header>
    <div class="banner-head">
        <img src="{{url('landing/images/banner-header.jpg')}}" alt="" width="1920" height="305" class="big">
        <img src="{{url('landing/images/bn-header-sm.jpg')}}" alt="" width="1023" height="305" class="small">
        <img src="{{url('landing/images/bn-header-sm2.jpg')}}" alt="" width="1342" height="400" class="small2">
    </div>
    <section class="body pr">
        <div class="fixCen">
            <div class="block1 intro-video">
                <div class="text">
                    <p>Là một trong những quốc gia đang phải gánh chịu hậu quả nặng nề của viêm gan virus, ước tính hiện nay, tỷ lệ người nhiễm virus viêm gan ở nước ta chiếm hơn 20% dân số,
                        trong đó có khoảng 5 triệu người trong tình trang viêm gan mạn tính, xơ gan với nhiều biến chứng nguy hiểm.</p>
                    <p>
                        Tromg khi đó việc điều trị căn bệnh này lại gặp nhiều khó khăn bởi thuốc đặc trị rất đắt tiền, khả năng kháng thuốc và tái phát sau khi ngừng thuốc cao, lại tiềm ẩn nguy cơ tác dụng phụ khi sử dụng lâu dài.
                        Theo ước tính, chi phí điều trị cho mỗi bệnh nhân viêm gan virus B lến đến 2.5 - 3,5 triệu đồng một tháng, còn bệnh nhân viêm gan virus C là 5 - 15 triệu đồng một tháng. Đây thực sự là một trở ngại lớn đối với
                        người bệnh, đặc biệt là những bệnh nhân nghèo - họ thường phải bỏ dở liệu trình điều trị khiến bệnh khó kiểm soát, dễ bùng phát, ảnh hưởng nghiêm trọng tới sức khỏe.
                    </p>
                </div>
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/yjV5mxH2nLk?autoplay=1&rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="block2">
            <div class="fixCen">
                <div class="item item1">
                    <img src="{{url('landing/images/text-img.png')}}" alt="" width="223" height="163">
                </div>
                <div class="item item2">
                    <img src="{{url('landing/images/pro-img.png')}}" alt="" width="449" height="350">
                </div>
                <div class="item item3">
                    <img src="{{url('landing/images/ball1.png')}}" alt="" width="110" height="110">
                </div>
                <div class="item item4">
                    <img src="{{url('landing/images/ball2.png')}}" alt="" width="198" height="164">
                </div>
            </div>
        </div>
        <div class="block3">
            <div class="fixCen">
                <h2>vì sao nên chọn giải độc gan tuệ linh?</h2>
                <div class="boxHot">
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Giải độc gan Tuệ Linh tiên phong sử dụng cà gai leo và mật nhân. Trong đó Cà gai leo là thảo dược số 1 hiện này giúp Khống chế bệnh viêm gan virus và xơ gan
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img2.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Giải độc gan Tuệ Linh đã được nghiên cứu lâm sàng tại bệnh viện Trung Ương Quân đội 108, chứng minh hiệu quả trong hỗ trợ điều trị viêm gan virus và phòng ngừa sự tiến triển của xơ gan
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img3.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Sản phẩm đã được thử dược tính, dược lý tại bộ môn Dược lý, Đại học Y Hà Nội chứng minh an toàn, không tác dụng phụ, dùng được lâu dài
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img4.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Nguồn nguyên liệu sạch, chuẩn hóa theo tiêu chuẩn của Tổ chức Y Tế Thế Giới tại Triệu Sơn, Thanh Hóa và Nghĩa Hành, Quảng Ngãi.
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img5.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Được sản xuất trên dây chuyền hiện đại đạt tiêu chuẩn quốc tế GMP-WHO
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img6.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            10 năm có mặt trên thị trường, sản phẩm được hàng triệu người tiêu dùng uy tín trao tặng giải thưởng cao quý (hình ảnh các cup giải thưởng)
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="block4">
            <div class="fixCen">
                <div class="center">
                    <h2>giải pháp hỗ trợ điều trị viêm gan virus và xo gan đến từ thảo dược</h2>
                </div>
                <div class="text">
                    <p>
                        Hưởng ứng ngày Toàn thế giới phòng chống viêm gan virus và kỷ niệm 10 năm GĐG TL có mặt trên thị trường, TPBVSK Giải độc gan Tuệ Linh
                        hân hạnh tổ chức chương trình Chung tay đẩy lùi viêm gan virus và xơ gan. Với chương trình này, Giải độc gan Tuệ Linh mong muốn
                        nâng cao nhận thức của cộng đồng cũng như các giải pháp điều trị hiệu quả nhằm ổn định sức khỏe, khống chế bệnh và giảm bớt chi phí điều
                        trị cho những bệnh nhân mắc viêm gan virus và xơ gan.
                    </p>
                </div>
                <div class="center">
                    <h2>thể lệ chương trình</h2>
                </div>
                <div class="program">
                    <strong>Thời gian: </strong> Từ 01/06/2017 đến hết 13/07/2017 <br>
                    <strong>Lễ tổng kết trao giải: </strong> 28/7/2017 <br>
                    Các cá nhân đặt giải sẽ được thông báo trên website <a href="http://www.viemgan.com.vn">www.viemgan.com.vn</a>
                    <br>
                    <h3>GIẢI THƯỞNG</h3>
                    <p>
                    <h4><red>5.1 GIẢI THƯỞNG THEO TUẦN</red></h4>
                    Mỗi tuần 05 giải sẽ được trao cho 5 bài dự thi hay nhất, mỗi giải được 3 hộp Giải độc gan Tuệ Linh.
                    </p>
                    <h4><red>5.2 GIẢI THƯỞNG CHUNG CUỘC</red></h4>
                    <p>
                        <span>01 giải nhất: </span> Điện thoại 7,000,000 VNĐ + 1 năm sử dụng miễn phí Giải độc gan Tuệ Linh (<i>trị giá 6,912,000 VNĐ</i>)
                        + 1 phiếu khám VIP tầm soát bệnh gan với GS. TS Nguyễn Văn Mùi tại mòng khám Medelab - Giám đốc chuyên môn phòng Khám Medelab, nguyên Phó Gám đốc
                        Học viện Quân Y 103, chuyên gia đầu ngành gan mật.
                    </p>
                    <p>
                        <span>02 Giải Nhì:</span> Mỗi giải cây nước nóng lạnh trị giá 4,000,000 VNĐ + 1 năm sử dụng miễn phí Giải độc gan Tuệ Linh (<i>trị giá 6,912,000 VNĐ</i>)
                        + 1 phiếu khám VIP tầm soát bệnh gan với GS. TS Nguyễn Văn Mùi tại mòng khám Medelab
                    </p>
                    <p>
                        <span>03 Giải Ba: </span> Mỗi giải một lò vi sóng thương hiệu Sharp (2 triệu VNĐ) + 1 năm sử dụng miễn phí Giải độc gan Tuệ Linh (<i>trị giá 6,912,000 VNĐ</i>)
                    </p>
                    <p>
                        <span>10 giải khuyến khích: </span> Mỗi giải 6 tháng sử dụng miễn phí Giải độc gan Tuệ Linh (<i>trị giá 3,456,000 VNĐ</i>)
                    </p>
                    <p>
                    <h4><red>5.3. GIẢI HỖ TRỢ</red></h4>
                    <span>10 Giải hỗ trợ: </span>Mỗi giải 01 năm sử dụng miễn phí Giải độc gan Tuệ Linh trị giá <strong>6,912,000 VNĐ</strong>
                    </p>
                </div>
            </div>
        </div>
        <div class="block5">
            <div class="fixCen">
                <div class="center">
                    <h2>tham gia chương trình chọn một trong những hình thức sau</h2>
                </div>
                <div class="text">
                    <p>
                        <strong><red>Cách 1: Tham gia trắc nghiệm trên fanpage tại đây</red></strong> <br>
                        <span>Bước 1: </span> Tham gia trắc nghiệm trên Fanpage <a href="#" title="Tham gia trắc nghiệm trên fanpage">TẠI ĐÂY</a>
                        <br>
                        <span>Bước 2: </span> Dự đoán có bao nhiêu người tham gia cuộc thi này? <br>
                        <span>Bước 3: Like, share chương trình lên tường của bạn và tag ít nhất 5 người bạn.</span>
                    </p>
                    <p>
                        <strong><red>Cách 2: Gửi bài chia sẻ quá trình chữa bệnh viêm gan virus hoặc xơ gan của bản thân trực tiếp với Công ty TNHH Tuệ Linh</red></strong>
                        <br>
                        <span>Gửi bài dự thi, dự đoán số người tham dự cuộc thi này kèm 01 ảnh người dự thi về địa chỉ: </span>
                        <i class="center" style="font-style: normal;display: block;">Công ty Tuệ Linh - tầng 5, tòa nhà 29 T1 Hoàng Đạo Thúy, Cầu Giấy, Hà Nội.</i>
                        <span>Ngoài bì thư ghi rõ: </span> Tham gia cuộc thi "Chung tay đẩy lùi viêm gan virus và xơ gan"
                    </p>
                    <p>
                        <strong><red>Cách 3: Gửi bài dự thi về địa chỉ email: <a href="mailto:giaidocgan@tuelinh.com">giaidocgan@tuelinh.com</a></red></strong>
                        <br>
                        <span>Phần Subject (Chủ đề): </span> Tham gia cuộc thi "Chung tay đẩy lùi bệnh viêm gan virus và xơ gan".
                        <br>
                        <span>Gửi bài dự thi, dự đoán số người tham dự cuộc thi này kèm 01 ảnh người dự thi</span>
                    </p>
                    <p>
                        <strong><red>Cách 4: Gửi bài chia sẻ quá trình chữa bệnh viêm gan virus hoặc xơ gan của bản thân ngay dưới box này</red></strong>
                    </p>
                    <div class="form_question">
                        <p><strong>GỬI CÂU HỎI</strong></p>
                        <form id="landing_form" action="{{url('saveLand')}}" method="POST" id="form1">
                            <div class="el">
                                <label for="name">Họ tên <red>(*)</red></label>
                                <input type="text" name="name" required placeholder="Họ và tên">
                            </div>
                            <div class="el">
                                <label for="tel">Điện thoại <red>(*)</red></label>
                                <input type="tel" name="phone" required placeholder="Số điện thoại">
                            </div>
                            <div class="el">
                                <label for="subject">Tiêu đề <red>(*)</red></label>
                                <input type="text" name="subject" required placeholder="Tiêu đề">
                            </div>
                            <div class="el">
                                <label for="email">Thư điện tử <red>(*)</red></label>
                                <input type="email" name="email" required placeholder="Thư điện tử (email)">
                            </div>
                            <div class="el">
                                <label for="address">Địa chỉ <red>(*)</red></label>
                                <input type="text" name="address" required placeholder="Địa chỉ">
                            </div>
                            <div class="el fullWidth">
                                <label for="content">Nội dung chia sẻ <red>(*)</red></label>
                                <textarea name="content" required cols="30" rows="10" placeholder="Nhập nội dung chia sẻ tại đây"></textarea>
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            </div>
                            <div class="el fullWidth">
                                <label for=""></label>
                                <button id="landing_form_submit">Gửi câu hỏi</button>
                                <button id="landing_form_reset" type="reset">Hủy câu hỏi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="block6 experience">
            <div class="fixCen">
                <h2 class="rs extend">CHIA SẺ NGAY CÂU CHUYỆN CỦA BẠN</h2>
                <div id="slider-2">
                    @foreach (\App\Site::getCommentIndex() as $comment)
                        <div class="item">
                        <div class="left">
                            <img src="{{url('files/images', $comment->image)}}" class="avatar" alt="Tên người" width="114" height="114">
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
        <div class="block7"></div>
        <div class="block8">
            <div class="fixCen">
                @foreach (\App\Site::getLatestQuestions(6) as $question)
                    <div class="share">
                    <h4 class="rs title">{{$question->title}}</h4>
                    <div class="ques-detail">
                       {!! $question->question !!}
                    </div>
                    <div class="view-more"><a href="{{url('hoi-dap', $question->slug)}}"title="Xem trả lời">Xem trả lời</a></div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <footer>
        <div class="fixCen">
            <div class="copyright">
                CỔNG THÔNG TIN VỀ BỆNH VIÊM GAN, XƠ GAN BẢO TRỢ BỚI HỘI GAN MẬT VIỆT NAM
            </div>
        </div>
    </footer>
    <div class="others">
        <div class="fixCen">
            <div class="content">
                <div class="links">
                    <a href="{{url('chuyen-muc', 'thong-tin-san-pham')}}" title="Thông tin sản phẩm">Thông tin sản phẩm</a>
                    <a href="{{url('chuyen-muc', 'nghien-cuu-khoa-hoc')}}" title="Nghiên cứu khoa học">Nghiên cứu khoa học</a>
                    <a href="{{url('chuyen-muc', 'trai-nghiem-khach-hang')}}" title="Trải nghiệm khách hàng">Trải nghiệm khách hàng</a>
                    <a href="{{url('phan-phoi')}}" class="diem-ban-btn" title="Điểm bán sản phẩm">ĐIỂM BÁN</a>
                </div>
            </div>
            <div class="content">
                <div class="links">
                    <a href="{{url('chuyen-muc', 'cac-benh-ve-gan')}}" title="Các bệnh về gan">Các bệnh về gan</a>
                    <a href="{{url('chuyen-muc', 'xo-gan')}}" title="Xơ gan">Xơ gan</a>
                    <a href="{{url('chuyen-muc', 'viem-gan-virus')}}" title="Viêm gan virus">Viêm gan virus</a>
                    <a href="{{url('chuyen-muc', 'ung-thu-gan')}}" title="Ung thư gan">Ung thu gan</a>
                    <a href="{{url('chuyen-muc', 'benh-gan-khac')}}" title="Bệnh gan khác">Bệnh gan khác</a>
                </div>
            </div>
            <div class="content">
                <div class="btn-groups">
                    <a href="{{url('phan-phoi')}}" class="diem-ban-btn">
                        <img src="{{url('landing/images/tu-van.jpg')}}" alt="" class="imgFull" width="230" height="50">
                    </a>
                    <a href="tel:0912571190" class="tu-van-btn" title="Tư vấn miễn phí">
                        <img src="{{url('landing/images/diem-ban.jpg')}}" alt="" class="imgFull" width="230" height="50">
                    </a>
                </div>
                <div class="text">
                    <span>
                        <i>
                            CỔNG THÔNG TIN VỀ BỆNH GAN - XƠ GAN
                        </i>
                    <brown>BẢO TRỢ BỚI HỘI GAN MẬT VIỆT NAM</brown>
                    </span>
                    <i class="icon">
                        <img src="{{url('landing/images/icon02.jpg')}}" alt="" class="imgFull" width="45" height="49">
                    </i>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script src="{{url('landing/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="{{url('landing/js/SmoothScroll.js')}}" type="text/javascript"></script>
<script src="{{url('landing/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('landing/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{url('landing/js/common.js')}}" type="text/javascript"></script>
<script>
    var Config = {};
    Config.url = '{{ url('/') }}';

</script>
<script>
    $(function(){
        $('#landing_form_reset').click(function(){
            $('#landing_form').reset();
            return false;
        });

        $('#landing_form_submit').click(function(){

            $("#landing_form").validate({
                submitHandler: function(form) {
                    // do other things for a valid form
                    form.submit();
                }
            });
            return false;
        });
    });
</script>
</html>
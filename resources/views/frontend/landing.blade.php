<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <title>Cổng thông tin về bệnh viêm gan - xơ gan | Viemgan.com.vn | Landing</title>
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
                    <a href="tel:18001190">
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
                    <p>Nước ta là một trong những quốc gia có tỷ lệ mắc viêm gan virus B và C cao trên thế giới, khoảng 20% dân số, trong đó có gần 5 triệu người mắc viêm gan mạn tính, xơ gan với nhiều biến chứng nguy hiểm.
                        Trong khi việc điều trị còn gặp nhiều khó khăn bởi thuốc đặc trị đắt tiền, khả năng kháng thuốc cao và có thể gặp tác dụng phụ. Theo ước tính, chi phí điều trị cho mỗi bệnh nhân viêm gan virus B lến đến 2.5 - 3,5 triệu đồng/tháng, viêm gan virus C là 5 - 15 triệu đồng/tháng. Nhiều người phải bỏ dở liệu trình điều trị khiến bệnh khó kiểm soát, dễ bùng phát, ảnh hưởng nghiêm trọng tới sức khỏe.</p>
                    <p>
                        Trước thực trạng đó, các nhà khoc học dược đã dày công nghiên cứu, cho ra đời TPBVSK Giải độc gan Tuệ Linh không chỉ giúp người bệnh giảm triệu chứng lâm sàng, hạ men gan, giảm nồng độ virus trong máu mà còn ngăn ngừa được biến chứng xơ gan. 
                        Có thể nói đây chính là giải pháp hỗ trợ điều trị hiệu quả với chi phí hợp lý.
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
                <div class="center"><h2>GIẢI PHÁP HỖ TRỢ ĐIỀU TRỊ VIÊM GAN VIRUS VÀ XƠ GAN HIỆU QUẢ TỪ THẢO DƯỢC</h2></div>
                <div class="boxHot">
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/3-thap-ky-chiet-xuat-duoc-lieu-viet-tri-benh-gan.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                      <h4>
                            Giải độc gan Tuệ Linh tiên phong kết hợp cà gai leo và mật nhân. Trong đó Cà gai leo là thảo dược đã được khoa học chứng minh hỗ trợ điều trị viêm gan virus và xơ gan hiệu quả. <i>Xem chi tiết <a href="http://www.viemgan.com.vn/3-thap-ky-chiet-xuat-duoc-lieu-viet-tri-benh-gan.html" target="_blank" style="color:#ffffff">tại đây</a></i>.                        </h4>
                    </div>
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/nghien-cuu-danh-gia-ket-qua-buoc-dau-cua-vien-giai-doc-gan-tue-linh-trong-ho-tro-dieu-tri-viem-gan-virus-b-man-tinh.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img7.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Giải độc gan Tuệ Linh đã được kiểm chứng lâm sàng tại bệnh viện Trung Ương Quân đội 108, chứng minh hiệu quả trong hỗ trợ điều trị viêm gan virus và phòng ngừa sự tiến triển của xơ gan. <i>Xem nghiên cứu <a href="http://www.viemgan.com.vn/nghien-cuu-danh-gia-ket-qua-buoc-dau-cua-vien-giai-doc-gan-tue-linh-trong-ho-tro-dieu-tri-viem-gan-virus-b-man-tinh.html" target="_blank" style="color:#ffffff">tại đây</a>.</i>
                        </h4>
                    </div>
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/dai-hoc-y-ha-noi-cong-bo-nghien-cuu-ve-tac-dung-cua-livganic-giai-doc-gan-tue-linh-tren-benh-nhan-lao-phoi.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img3.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Sản phẩm đã được nghiên cứu dược tính, dược lý tại bộ môn Dược lý, Đại học Y Hà Nội và chứng minh an toàn, không tác dụng phụ, dùng được lâu dài.<i> Xem nghiên cứu <a href="http://www.viemgan.com.vn/dai-hoc-y-ha-noi-cong-bo-nghien-cuu-ve-tac-dung-cua-livganic-giai-doc-gan-tue-linh-tren-benh-nhan-lao-phoi.html" target="_blank" style="color:#ffffff">tại đây</a></i>.
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img2.jpg')}}" alt="hot" width="127" height="127">
                        </a>
                        <h4>
                            Nguồn nguyên liệu sạch, chuẩn hóa theo tiêu chuẩn của Tổ chức Y Tế Thế Giới tại Triệu Sơn, Thanh Hóa và Nghĩa Hành, Quảng Ngãi.
                        </h4>
                    </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img4.jpg')}}" alt="hot" width="127" height="127">
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
                            10 năm có mặt trên thị trường, sản phẩm được hàng triệu người tin dùng và đã vinh dự đạt giải thưởng cao quý: Huy chương Vàng vì Sức khỏe người Việt 2015, Top 10 thương hiệu chất lượng nhất 2016…
                        </h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="block4">
            <div class="fixCen">
                <div class="center">
                    <h2>CHUNG TAY ĐẨY LÙI VIÊM GAN VIRUS VÀ XƠ GAN</h2>
                </div>
                <div class="text">
                    <p>
                        Hưởng ứng ngày Toàn thế giới phòng chống viêm gan virus (28/7/2017) và kỷ niệm 10 năm đồng hành và chăm sóc lá gan người Việt,
                        sản phẩm Giải độc gan Tuệ Linh phối hợp cùng với Hội gan mật Việt Nam tổ chức cuộc thi “Chung tay đẩy lùi viêm gan virus và xơ gan”.
                        Với chương trình này, chúng tôi mong muốn nâng cao nhận thức của cộng đồng cũng như các giải pháp phòng và điều trị bệnh hiệu quả nhằm ổn định sức khỏe và giảm bớt chi phí điều trị cho những bệnh nhân mắc viêm gan virus và xơ gan.
                    </p>
                </div>
                <div class="center">
                    <h2>Thể lệ chương trình</h2>
                </div>
              <div class="program">
                    <strong>Thời gian: </strong> Từ 01/06/2017 đến hết 31/07/2017 <br>
                    <br>
                    Các cá nhân đạt giải sẽ được thông báo trên website <a href="http://www.viemgan.com.vn">www.viemgan.com.vn</a> và trên fanpage <a href="https://www.facebook.com/viemgan.com.vn" target="_blank">Phòng bệnh gan</a>.
                    <br>
                    <h3>GIẢI THƯỞNG</h3>
                  <p>
                    <strong><red>Vòng 1: Thi  trắc nghiệm</red></strong> 
                <li>Mỗi  tuần Giải độc gan Tuệ Linh sẽ tổ chức 01 cuộc thi trắc nghiệm và chọn ra 50 người  làm theo đúng thể lệ để trao giải.</li>
                    <li>Giải thưởng: Mỗi người <red><i>02 hộp Giải độc gan Tuệ Linh </i></red>tương đương <red>384.000 VNĐ</red></li>
                    </p>
                    <p>
                    <strong><red>Vòng 2: Chia sẻ cảm nhận khi sử dụng Giải độc gan Tuệ Linh</red></strong>
                <li>Những khách hàng làm đúng các bước như thể lệ phía dưới sẽ được nhận ngay <red> 01 hộp Giải độc gan Tuệ Linh </red>
                  trị giá 192.000 VNĐ </li>
              </div>
            </div>
        </div>
        <div class="block5">
            <div class="fixCen">
                <div class="center">
                    <h2>Cách thức tham dự chương trình</h2>
                </div>
                <div class="text">
                  <p>
                          <strong>
                          <red>Vòng 1: Thi  trắc nghiệm ( thời gian từ 01/06/2017 – 10/7/2017)</red>
                          </strong>.<br>
                          Từ  ngày 01/06/2017 – 10/07/2017, mỗi tuần Giải độc gan Tuệ Linh sẽ tổ chức 01 cuộc thi trắc nghiệm. Người  tham dự làm theo  các bước dưới đây<br>
                        <span>Bước 1: </span>Thả tim và share cuộc thi ở chế độ công khai. <br>
                          <span>Bước 2: </span>Tag 03 người bạn vào câu trả lời<br>
                        <span>Bước 3: </span>Tham gia trả lời câu hỏi trắc nghiệm <a href="https://www.facebook.com/viemgan.com.vn/posts/1938099579769052" title="Tham gia trắc nghiệm trên fanpage" target="_blank">TẠI ĐÂY</a>
                  <p>- Hàng tuần, Ban tổ chức (BTC) sẽ chọn ra tối đa 50 người trả lời đúng và làm đúng các bước trên để trao giải. <br>
                        - Giải thưởng: Mỗi người <red>02 hộp Giải độc gan Tuệ Linh </red> tương đương <red> 384.000 VNĐ.</red>
                  </p>
                  <p>
                        <strong>
                        <red>Vòng 2: Chia sẻ cảm nhận khi sử dụng Giải độc gan Tuệ Linh</red>
                        </strong>
                        <br>
                        Tặng ngay 01 Giải độc gan Tuệ Linh cho những khách hàng trúng thưởng ở vòng 1 và làm đầy đủ các bước sau:
                  <p><strong><red>Các bước tham dự:</red> </strong></p>
                  Chia sẻ cảm nghĩ khi sử dụng Giải độc gan Tuệ Linh trên fanpage  Phòng Bệnh Gan tại đây. Khách hàng comment bao gồm:
                        <li>Ảnh chụp của người dùng cùng Giải độc  gan Tuệ Linh </li>
                        <li>Chia sẻ về quá trình sử dụng Giải độc gan Tuệ Linh về các nội  dung:</li>
                        <p>- Trước khi sử dụng Giải độc gan Tuệ Linh, tình trạng bệnh, tình trạng sức khỏe thế nào ? </p>
                        <p>- Tác dụng sau khi sử dụng Giải độc gan Tuệ Linh ? Và chia sẻ về Giải độc gan Tuệ Linh với mọi người.</p>
                        <div class="block5">
            <div class="fixCen">
              <div class="center"></div>
                        <p>Mọi thắc mắc của bạn về bệnh gan hãy gọi ngay  <strong><a href="tel:18001190"><red>18001190</red></a></strong> (miễn phí cước gọi) để nhận được sự tư vấn của các Chuyên gia, bác sỹ và dược sỹ.
                        Hoặc gửi câu hỏi của bạn cho Thầy thuốc nhân dân, GS.TS <red> Nguyễn Văn Mùi </red> theo biểu mẫu dưới đây.</p>
                        <p>Bạn có thể đặt mua ngay Giải độc gan Tuệ Linh theo phương thức - giao hàng và thu tiền tại nhà <a href="http://www.viemgan.com.vn/phan-phoi" target="_blank"><red>tại đây</red></a></p>
                        </div>
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
                                <label for="content">Câu hỏi - Nội dung chia sẻ <red>(*)</red></label>
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
        <div class="block3">
            <div class="fixCen">
                <div class="center"><h2>KIẾN THỨC CẦN BIẾT ĐỂ PHÒNG VÀ ĐIỀU TRỊ VIÊM GAN VIRUS & XƠ GAN HIỆU QUẢ</h2></div>
                <div class="boxHot">
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/viem-gan-b-nguyen-nhan-trieu-chung-va-cach-dieu-tri.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img9.jpg')}}" alt="hot" width="127" height="127">                        </a>
                      <h4><a href="http://www.viemgan.com.vn/viem-gan-b-nguyen-nhan-trieu-chung-va-cach-dieu-tri.html" style="color:#FFFFFF">Nguyên nhân, triệu chứng và cách điều trị bệnh viêm gan B</a></a>                      </h4>
                  </div>
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/cap-nhat-phac-do-dieu-tri-viem-gan-b-man-tinh-hieu-qua-nhat-hien-nay.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img7.jpg')}}" alt="hot" width="127" height="127">                        </a>
                        <h4>
                            <a href="http://www.viemgan.com.vn/cap-nhat-phac-do-dieu-tri-viem-gan-b-man-tinh-hieu-qua-nhat-hien-nay.html" target="_blank" style="color:#FFFFFF">Cập nhật phác đồ điều trị viêm gan B hiệu quả nhất hiện nay</a></h4>
                  </div>
                    <div class="item">
                        <a href="http://www.viemgan.com.vn/giai-phap-moi-ho-tro-dieu-tri-viem-gan-b.html" class="thumb">
                            <img src="{{url('landing/images/thumb-img3.jpg')}}" alt="hot" width="127" height="127">                        </a>
                        <h4>
                        <a href="http://www.viemgan.com.vn/giai-phap-moi-ho-tro-dieu-tri-viem-gan-b.html" target="_blank" style="color:#FFFFFF">Giải pháp mới hỗ trợ điều trị viêm gan virus B hiệu quả</a>                        </h4>
                  </div>
                    <div class="item">
                        <a href="#" class="thumb">
                            <img src="{{url('landing/images/thumb-img8.jpg')}}" alt="hot" width="127" height="127">                        </a>
                        <h4><a href="http://www.viemgan.com.vn/benh-xo-gan-la-gi-xo-gan-nguy-hiem-nhu-the-nao.html" target="_blank" style="color:#FFFFFF">Những điều cần biết về bệnh xơ gan</a></h4>
                  </div>
                </div>
            </div>
        </div>
        <div class="block6 experience">
            <div class="fixCen">
                <h2 class="rs extend"><a href="http://www.viemgan.com.vn/chuong-trinh-chia-se-ngay-nhan-qua-hay.html" title="Chia sẻ" target="_blank" style="color:#FFFFFF">CHIA SẺ NGAY CÂU CHUYỆN CỦA BẠN</a></h2>
                <div id="slider-2">
                    @foreach (\App\Site::getCommentIndex() as $comment)
                        <div class="item">
                        <div class="left">
                            <img src="{{url('files/images', $comment->image)}}" class="avatar" alt="Tên người" width="114" height="114">
                        </div>
                        <div class="right">
                            <div class="title">{{str_limit($comment->title, 60)}}</div>
                            <div class="name">{{$comment->name}}</div>
                            <div class="address">{{str_limit($comment->address, 30)}}</div>
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
                    <h4 class="rs title"><a href="{{url('hoi-dap', $question->slug)}}"title="Câu hỏi" target="_blank">{{$question->title}}</a></h4>
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
                    <a href="{{url('chuyen-muc', 'san-pham')}}" title="Thông tin sản phẩm">Thông tin sản phẩm</a>
                    <a href="{{url('chuyen-muc', 'nghien-cuu-lam-sang')}}" title="Nghiên cứu khoa học">Nghiên cứu khoa học</a>
                    <a href="{{url('chuyen-muc', 'kinh-nghiem')}}" title="Trải nghiệm khách hàng">Trải nghiệm khách hàng</a>
                    <a href="{{url('phan-phoi')}}" class="diem-ban-btn" title="Điểm bán sản phẩm">ĐIỂM BÁN</a>
                </div>
            </div>
            <div class="content">
                <div class="links">
                    <a href="{{url('chuyen-muc', 'cac-benh-ve-gan')}}" title="Các bệnh về gan">Các bệnh về gan</a>
                    <a href="{{url('chuyen-muc', 'xo-gan')}}" title="Xơ gan">Xơ gan</a>
                    <a href="{{url('chuyen-muc', 'viem-gan-virus')}}" title="Viêm gan virus">Viêm gan virus</a>
                    <a href="{{url('chuyen-muc', 'ung-thu-gan')}}" title="Ung thư gan">Ung thu gan</a>
                    <a href="{{url('chuyen-muc', 'men-gan-cao')}}" title="Men gan cao">Men gan cao</a>
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
<!-- GA-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40782874-1', 'auto');
  ga('send', 'pageview');

</script>
<!-- GA-->

<!-- Eclick-->
<script type="text/javascript">
    (function () {
        var _eclickq = window._eclickq || (window._eclickq = []);
        if (!_eclickq.loaded) {
            var eclickTracking = document.createElement('script');
            eclickTracking.async = true;
            eclickTracking.src = ('https:' == document.location.protocol ? 'https:' : 'http:') + '//s.eclick.vn/delivery/retargeting.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(eclickTracking, s);
            _eclickq.loaded = true;
        }
        _eclickq.push(['addPixelId', 11651]);
    })();
    window._eclickq = window._eclickq || [];
    window._eclickq.push(['track', 'PixelInitialized', {}]);
</script>
<!-- Eclick-->

<!-- Admicro-->
<script type="text/javascript" src="//admicro1.vcmedia.vn/cpa/admicro.js"></script>
<script type="text/javascript">window.admicro_cpa_q = window.admicro_cpa_q || [];
    window.admicro_cpa_q.push({event: "retargeting", id: 1633});
</script>
<!-- Admicro-->
</html>
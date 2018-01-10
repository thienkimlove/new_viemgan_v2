<form action="{{url('saveContact')}}" method="post" id="form_get_phone">
<div class="box-intro">
    <div class="some-intro">
        <div class="pro-img">
            <img src="{{url('viemgan/images/bs-img.jpg')}}" alt="" width="206" height="199">
        </div>
        <div class="text">
            <b>BẠN HỎI GIẢO SƯ TRẢ LỜI: </b><br>
            Ban bảo trợ chuyên môn do GS.TS Nguyễn Văn Mùi làm trưởng ban cùng PGS.TS Trịnh Thị Xuân Hòa, Ts.Bs Đinh Quý Lan sẽ giải đáp giúp bạn những thắc mắc về vấn đề gan mật nói chung cũng như bệnh viêm gan virus nói riêng, từ đó cho bạn cái nhìn chuẩn xác nhất về bệnh cũng như phương pháp điều trị hiệu quả. <br>
            Làm sao để đặt câu hỏi với ban chuyên môn và được giải đáp ? <br>
            <b>Cách 1</b>: Gọi đến tổng đài tư vấn miễn cước: <a href="tel: 18001190" style="color:#FF0000"><b>1800 1190</b></a><br>
            <b>Cách 2</b>: Gửi câu hỏi cho Thầy thuốc nhân dân, GS.TS Nguyễn Văn Mùi để được chuyên gia trả lời các thắc mắc của bạn <a href="http://www.viemgan.com.vn/lien-he" target="_blank"><b>TẠI ĐÂY</b></a><br>
            <b>Cách 3</b>: Để lại số điện thoại, đội ngũ cố vấn sẽ liên hệ lại cho bạn! <br>
      </div>
    </div>
    <div class="form-get-phone">
            <input type="hidden" name="email" value="chiasetuelinh@gmail.com">
            <input type="hidden" name="name" value="chi co dien thoai">
            <input type="hidden" name="content" value="chi co dien thoai">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="number" id="get_phone" name="phone" placeholder="Số điện thoại" class="get-phone">
            <button id="form_get_phone_button">Gửi</button>

    </div>
</div>
</form>
@if ($is_full)
<form action="{{url('saveContact')}}" method="post" id="contact">
    <div class="form-row">
        <label for="name">Họ và tên</label>
        <input type="text" name="name" id="name" placeholder="Nhập họ và tên" required>
    </div>
    <div class="form-row">
        <label for="phone">Điện thoại</label>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="tel" name="phone" id="phone" placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-row">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Nhập email" required>
    </div>

    <div class="form-row">
        <label for="content">Nội dung</label>
        <textarea name="content" id="content" cols="30" rows="10"
                  placeholder="Nhập nội dung"></textarea>
    </div>

    <div class="errors" id="delivery_form_message" style="display: none">Điền đầy đủ các thông tin</div>

    <div class="contain-btn form-row">
        <button id="delivery_form_submit" type="button">Gửi</button>
        <button id="delivery_form_reset" type="reset">Nhập lại</button>
    </div>
</form>
@endif

@section('frontend_script')
    <script>
        $(function(){
            $('#delivery_form_submit').click(function(e){
                e.preventDefault();
                var name = $('#name').val();
                var phone = $('#phone').val();
                var email = $('#email').val();
                var content = $('#content').val();

                if (!name || !phone || !email || !content) {
                    $('#delivery_form_message').show();
                } else {
                    $('#contact').submit();
                }

                return false;
            });

            $('#form_get_phone_button').click(function(e){
                e.preventDefault();
                $('#form_get_phone').submit();
                return false;
            });
        });
    </script>
@endsection
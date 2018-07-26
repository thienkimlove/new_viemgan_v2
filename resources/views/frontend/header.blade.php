<div class="banner-ads left">
    @foreach (\App\Site::getFrontendBanners()->where('position', 3) as $banner)
    <a href="{{$banner->link}}" title="" target="_blank">
        <img src="{{url('files/images', $banner->image)}}" alt="" width="171" height="454">
    </a>
    @endforeach
</div>
<div class="btn-group-fix banner-ads">
    <a href="https://www.facebook.com/viemgan.com.vn" title="Fanpage"><img src="{{url('viemgan/images/fb-icon.png')}}" alt="Fanpage" width="63" height="63"></a>
    <a href="tel: 18001190 " title="Gọi tư vấn"><img src="{{url('viemgan/images/call-icon.png')}}" alt="Gọi tư vấn" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Mua hàng"><img src="{{url('viemgan/images/cart-icon.png')}}" alt="Giỏ hàng" width="63" height="63"></a>
    <a href="{{url('phan-phoi')}}" title="Điểm bán sản phẩm"><img src="{{url('viemgan/images/location-icon.png')}}" alt="Điểm bán sản phẩm" width="63" height="63"></a>
</div>
<header class="pr">
    <div class="bg-top">
        <a href="javascript:void(0)" class="miniMenu-btn pa open-main-nav" data-menu="#main-nav"></a>
    </div>
    <div class="fixCen head-info">
        <h1 class="rs"><a href="{{url('/')}}" class="logo" title="Viêm gan">
                <img src="{{url('viemgan/images/logo.png')}}" alt="Viêm gan" width="170" height="99" class="imgFull">
            </a></h1>
        <span class="slogan">
                    Trang cộng đồng chia sẻ kinh nghiệm đẩy lùi viêm gan virus, xơ gan.
                    <i class="small"></i>
                </span>
        <div class="icon-header">
            <img src="{{url('viemgan/images/professor.png')}}" alt="" class="imgFull" width="67" height="71">
        </div>
        <span class="hotline" id="hotline">
                    <a href="tel:">
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
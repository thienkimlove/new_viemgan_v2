<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta content='CSVN' name='generator'/>
    <meta property="fb:app_id" content="1569708656596422"/>
    <meta name="google-site-verification" content="UeDPFDj8wb-lUKJB4mbzIdJb-93eWttF33RSYJhoZjw" />
    <title>{{!empty($meta_title)? $meta_title : 'Cổng thông tin về bệnh Viêm gan - Xơ gan - Viêm gan virus B - Men gan cao - Giải độc gan'}}</title>
    <link href="https://plus.google.com/107515763736347546999" rel="publisher"/>
    <link rel="stylesheet" href="{{url('viemgan/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('viemgan/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{url('viemgan/css/common.css')}}">
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="description" content="{{!empty($meta_desc)? $meta_desc : 'Điều trị hiệu quả bệnh viêm gan, viêm gan virus, xơ gan, ung thư gan, giải độc gan, men gan cao'}}"/>
    <meta name="keyword" content="{{!empty($meta_keywords)? $meta_keywords : 'viêm gan, viem gan, viem gan virus, xơ gan, ung thư gan, giải độc gan, men gan cao'}}"/>
    <meta property="fb:app_id" content="1569708656596422"/>
    <script>(function () {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(['addPixelId', '1607876032783308']);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>
    <noscript>
        <img height="1" width="1" alt="" style="display:none"
             src="https://www.facebook.com/tr?id=1607876032783308&amp;ev=PixelInitialized"/>
    </noscript>
    <!-- Facebook Conversion Code -->
    <script>(function () {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', '6030780499151', {'value': '0.00', 'currency': 'VND'}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none"
                   src="https://www.facebook.com/tr?ev=6030780499151&amp;cd[value]=0.00&amp;cd[currency]=VND&amp;noscript=1"/>
    </noscript>
    <!-- Eclick -->
<script type="text/javascript">
(function () {
var _eclickq = window._eclickq || (window._eclickq = []);
if (!_eclickq.loaded) {
var eclickTracking = document.createElement('script');
            eclickTracking.async = true;
            eclickTracking.src = ('https:'==document.location.protocol?'https:':'http:')+'//s.eclick.vn/delivery/retargeting.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(eclickTracking, s);
            _eclickq.loaded = true;
                                                                                                            
}
_eclickq.push(['addPixelId', 11651
]);
})();
window._eclickq = window._eclickq || [];
window._eclickq.push(['track', 'PixelInitialized', {}]); 
</script>
    <!-- Native -->
<script type="text/javascript">
(function () {
var _eclickq = window._eclickq || (window._eclickq = []);
if (!_eclickq.loaded) {
var eclickTracking = document.createElement('script');
            eclickTracking.async = true;
            eclickTracking.src = ('https:'==document.location.protocol?'https:':'http:')+'//s.eclick.vn/delivery/retargeting.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(eclickTracking, s);
            _eclickq.loaded = true;
                                                                                                            
}
_eclickq.push(['addPixelId', 13209
]);
})();
window._eclickq = window._eclickq || [];
window._eclickq.push(['track', 'PixelInitialized', {}]); 
</script>


</head>
<body>
<div class="wrapper home pr">
    @include('frontend.header')
     @yield('content')
   @include('frontend.footer')
</div>
</body>
<script>
    var Config = {};
    Config.url = '{{ url('/') }}';

</script>

<script src="{{url('viemgan/js/jquery-1.11.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('viemgan/js/angular.min.js')}}"></script>
<script src="{{url('viemgan/js/SmoothScroll.js')}}" type="text/javascript"></script>
<script src="{{url('viemgan/js/owl.carousel.min.js')}}" type="text/javascript"></script>
<script src="{{url('viemgan/js/jquery.easing.min.js')}}" type="text/javascript"></script>
<script src="{{url('viemgan/js/common.js')}}" type="text/javascript"></script>

<script>
    $(function(){
        $('#box_submit').click(function(){
            var phone = $('#box_phone').val();
            var email = $('#box_email').val();
            var content = $('#box_content').val();

            if (!phone || !email || !content) {
                $('#box_message').show().text('Xin hãy nhập đủ thông tin!');
            } else {
                $('#getQues').submit();
            }
            return false;
        });
    });
</script>

<script type="text/javascript" src="//admicro1.vcmedia.vn/cpa/admicro.js"></script>
<script type="text/javascript">window.admicro_cpa_q = window.admicro_cpa_q || [];
    window.admicro_cpa_q.push({event: "retargeting", id: 1633});
</script>

<!-- Facebook Code Comment-->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1569708656596422',
            xfbml      : true,
            version    : 'v2.6'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=1569708656596422";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!-- Facebook Code Comment-->

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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-40782874-1', 'auto');
  ga('send', 'pageview');

</script>

<!--- Script ANTS - remarketing -->
<script type="text/javascript" async src="//e-vcdn.anthill.vn/delivery-ants/conversion.js"></script>
<!--- end ANTS - remarketing -->
<script type="text/javascript">
    var ants_analytic = ants_analytic || [];
    ants_analytic.push({conversionId : "cd56d85f"});
</script>

<!-- Google Code dành cho Thẻ tiếp thị lại -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 954780037;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/954780037/?guid=ON&amp;script=0"/>
    </div>
</noscript>

<!-- Google +-->
<script src="https://apis.google.com/js/platform.js" async defer></script>
  <!-- Google +-->
@yield('frontend_script')
</html>
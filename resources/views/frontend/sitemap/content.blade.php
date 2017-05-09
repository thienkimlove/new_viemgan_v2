@extends('frontend.sitemap.template')

@section('content')
    <div id="content"><h1>XML Sitemap</h1>
        <p class="expl">
            Generated by <a href="https://yoast.com/">Yoast</a><a href="https://yoast.com/wordpress/plugins/seo/">SEO</a>,
            this is an XML Sitemap, meant for consumption by search engines.<br>
            You can find more information about XML sitemaps on <a href="http://sitemaps.org">sitemaps.org</a>.
        </p>
        <p class="expl">
            This XML Sitemap contains {{count($map)}} URLs.
        </p>
        <p class="expl"><a href="{{url('sitemap_index.xml')}}">↑ Sitemap Index</a></p>
        <table id="sitemap" cellpadding="3">
            <thead>
            <tr>
                <th class="header" width="75%">URL</th>
                <th title="Index Priority" class="header" width="5%">Prio</th>
                <th class="header" width="5%">Images</th>
                <th title="Change Frequency" class="header" width="5%">Ch. Freq.</th>
                <th title="Last Modification Time" class="header" width="10%">Last Mod.</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($map as $k => $content)
                <tr class="{{($k & 1) ? 'odd' : 'even'}}">
                    <td><a href="{{$content['url']}}">{{$content['url']}}</a></td>
                    <td>{{$content['priority']}}</td>
                    <td>{{$content['images']}}</td>
                    <td>{{$content['frequency']}}</td>
                    <td>{{$content['time']}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
@endsection
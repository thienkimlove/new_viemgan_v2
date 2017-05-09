<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>XML Sitemap</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
        body {
            font-family: Helvetica, Arial, sans-serif;
            font-size: 13px;
            color: #545353;
        }
        table {
            border: none;
            border-collapse: collapse;
        }
        #sitemap tr.odd td {
            background-color: #eee !important;
        }
        #sitemap tbody tr:hover td {
            background-color: #ccc;
        }
        #sitemap tbody tr:hover td, #sitemap tbody tr:hover td a {
            color: #000;
        }
        #content {
            margin: 0 auto;
            width: 1000px;
        }
        .expl {
            margin: 18px 3px;
            line-height: 1.2em;
        }
        .expl a {
            color: #da3114;
            font-weight: bold;
        }
        .expl a:visited {
            color: #da3114;
        }
        a {
            color: #000;
            text-decoration: none;
        }
        a:visited {
            color: #777;
        }
        a:hover {
            text-decoration: underline;
        }
        td {
            font-size:11px;
        }
        th {
            text-align:left;
            padding-right:30px;
            font-size:11px;
        }
        thead th {
            border-bottom: 1px solid #000;
            cursor: pointer;
        }
    </style>
</head>
<body>
@yield('content')
<script type="text/javascript" src="{{url('sitemap', 'jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('sitemap', 'jquery.tablesorter.min.js')}}"></script><script type="text/javascript">
    $(document).ready(function() {
        $("#sitemap").tablesorter( { widgets: ['zebra'] } );
    });
</script></body></html>
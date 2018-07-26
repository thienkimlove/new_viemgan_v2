<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf_token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Custom Fonts -->
    <link href="{{ url('/css/admin/admin.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('/css/admin/select2.min.css')}}" rel="stylesheet" />
    <link href="{{ url('/js/admin/datetimepicker/build/jquery.datetimepicker.min.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="{{url('js/admin/jquery-ui.css')}}">

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <!-- /.navbar-header -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Admin</a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown-user -->
            <!-- /.dropdown -->

            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{url('admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <li>
                        <a><i class="fa fa-files-o fa-fw"></i>Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'users')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/users/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Categories<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'categories')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/categories/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'posts')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/posts/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Videos<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'videos')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/videos/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Banners<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'banners')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/banners/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Questions<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'questions')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/questions/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Tags<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'tags')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/tags/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Trích Dẫn<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'comments')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/comments/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Contacts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'contacts')}}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Registers<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'registers')}}">List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Phân Phối<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'stores')}}">List</a>
                            </li>

                            <li>
                                <a href="{{url('admin/stores/create')}}">Create</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Orders<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'orders')}}">List</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a><i class="fa fa-folder-o fa-fw"></i>Landing Forms<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="{{url('admin', 'lands')}}">List</a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>


    <div id="page-wrapper">
        @include('flash::message')
        @yield('content')
    </div>

</div>
<script>
    window.baseUrl = '{{url('/')}}';
</script>
<script src="{{url('js/admin/admin.js')}}"></script>
<script src="{{url('js/admin/ckeditor/ckeditor.js')}}"></script>
<script src="{{url('js/admin/select2.min.js')}}"></script>
<script src="{{url('js/admin/datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
<script src="{{url('js/admin/jquery-ui.js')}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=csrf_token]').attr('content') }
    });

</script>
@yield('footer')
</body>
</html>

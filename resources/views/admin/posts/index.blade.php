@extends('admin.template')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{strtoupper($model)}}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-heading">
                    <div class="input-group custom-search-form">
                        {!! Form::open(['method' => 'GET', 'route' =>  [$model.'.index'] ]) !!}
                        <span class="input-group-btn">
                            <input type="text" value="{{$searchContent}}" name="q" class="form-control" placeholder="Search ..">

                            <input type="hidden" name="cate_id" value="{{$searchCate}}" />

                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Tiêu Đề</th>
                                <th>Author</th>
                                <th>Desc</th>
                                <th>Image</th>
                                <th>Category</th>

                                <th>Action</th>

                                @foreach (config("site.content.$model.modules") as $k => $module)
                                    <th>{{$module}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->title}}</td>
                                    <td>{{$content->tieude}}</td>
                                    <td>{{$content->author}}</td>
                                    <td>{{$content->desc}}</td>
                                    <td><img src="{{url('img/cache/small', $content->image)}}" /></td>
                                    <td>{{ isset($content->category) ? $content->category->name : 'Category da bi xoa id='.$content->category_id}}</td>

                                  <td>
                                        <button id-attr="{{$content->id}}"
                                                content-attr="{{$model}}"
                                                class="btn btn-primary btn-sm edit-content"
                                                type="button">
                                            Edit
                                        </button><br /><br />
                                        {!! Form::open(['method' => 'DELETE', 'route' => [$model.'.destroy', $content->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                        {!! Form::close() !!}<br />
                                        <button class="btn btn-primary btn-sm" type="button">
                                    <a target="_blank" href="{{url($content->slug.'.html')}}" style="color:#FFFFFF">View Post</a>
                                     </button>
                                    </td>

                                    @foreach (config("site.content.$model.modules") as $k => $module)
                                        <td>
                                            @if ($enabled = \App\Site::moduleEnable($k, $model, $content->id))
                                                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/modules/'.$enabled->id)]) !!}
                                                <button type="submit" class="btn btn-danger btn-mini">Bật</button>
                                                <input type="hidden" name="redirect_back" value="{{Request::url()}}" />
                                                {!! Form::close() !!}
                                            @else
                                                {!! Form::open(['method' => 'POST', 'url' => url('admin/modules')]) !!}
                                                    <input type="hidden" name="key_name" value="{{$module}}" />
                                                    <input type="hidden" name="key_type" value="{{$k}}" />
                                                    <input type="hidden" name="key_content" value="{{$model}}" />
                                                    <input type="hidden" name="key_value" value="{{$content->id}}" />
                                                    <input type="hidden" name="redirect_back" value="{{Request::fullUrl()}}" />
                                                    <button type="submit" class="btn btn-danger btn-mini">Tắt</button>
                                                {!! Form::close() !!}
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="row">
                        <div class="col-sm-6">{!!$contents->render()!!}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button class="btn btn-primary add-content" content-attr="{{$model}}" type="button">Add</button>
                        </div>
                    </div>


                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>
@endsection
@section('footer')
    <script>
        $(function(){
            $('.add-content').click(function(){
                window.location.href = window.baseUrl + '/admin/'+$(this).attr('content-attr')+'/create';
            });
            $('.edit-content').click(function(){
                window.location.href = window.baseUrl + '/admin/'+$(this).attr('content-attr')+'/' + $(this).attr('id-attr') + '/edit';
            });
        });
    </script>
@endsection
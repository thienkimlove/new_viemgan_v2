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

                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        {!! Form::close() !!}
                    </div>

                    <hr />
                    <hr />

                    <div class="input-group">
                        <span class="input-group-btn">
                             <button id="export_to_excel" content-attr="{{$model}}" class="btn btn-default">Export Excel</button>
                        </span>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Content</th>
                                <th>Status</th>
                                <th>Created</th>
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
                                    <td>{{$content->name}}</td>
                                    <td>{{$content->email}}</td>
                                    <td>{{$content->phone}}</td>
                                    <td>{{$content->content}}</td>
                                    <td>{{config('site.contact_status.'.$content->status)}}</td>
                                    <td>{{$content->created_at->format('Y/m/d H:i:s')}}</td>

                                    <td>
                                        <button id-attr="{{$content->id}}"
                                                content-attr="{{$model}}"
                                                class="btn btn-primary btn-sm edit-content"
                                                type="button">
                                            Edit
                                        </button>&nbsp;
                                        {!! Form::open(['method' => 'DELETE', 'route' => [$model.'.destroy', $content->id]]) !!}
                                        <button type="submit" class="btn btn-danger btn-mini">Delete</button>
                                        {!! Form::close() !!}
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
            $('#export_to_excel').click(function(){
                window.location.href = window.baseUrl + '/admin/export/'+$(this).attr('content-attr');
            });
        });
    </script>
@endsection
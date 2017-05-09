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

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Avatar</th>
                                <th>Address</th>
                                <th>Comment</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->title}}</td>
                                    <td>{{$content->name}}</td>
                                    <td>{{$content->link}}</td>
                                    <td><img src="{{url('img/cache/small/' .$content->image)}}" /></td>
                                    <td>{{$content->address}}</td>
                                    <td>{!! $content->comment !!}</td>
                                    <td>{{($content->status)? 'Active' : 'Inactive'}}</td>


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
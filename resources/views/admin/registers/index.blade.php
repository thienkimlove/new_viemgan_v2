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
                            <input type="text" value="{{$searchContent}}" name="q" class="form-control" placeholder="Search ..">&nbsp;&nbsp;
                        </span>

                        <span class="input-group-btn">
                             <input type="text" id="from_date" value="{{$searchFromDate}}" name="from_date" class="form-control" placeholder="From Date ..">&nbsp;&nbsp;
                        </span>

                        <span class="input-group-btn">
                             <input type="text" id="to_date" value="{{$searchToDate}}" name="to_date" class="form-control" placeholder="To Date ..">&nbsp;&nbsp;
                        </span>

                        <span class="input-group-btn">
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
                                <th>Address</th>
                                <th>SSN</th>
                                <th>DOB</th>
                                <th>Province</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{$content->id}}</td>
                                    <td>{{$content->name}}</td>
                                    <td>{{$content->email}}</td>
                                    <td>{{$content->phone}}</td>
                                    <td>{{$content->address}}</td>
                                    <td>{{$content->ssn}}</td>
                                    <td>{{$content->ddob}}</td>
                                    <td>{{$content->province}}</td>
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

                var from_date = $('#from_date').val();
                var to_date = $('#to_date').val();
                var toUrl = window.baseUrl + '/admin/export/'+$(this).attr('content-attr')+'?export=1';
                if (from_date) {
                    toUrl +=  '&from_date=' + from_date;
                }

                if (to_date) {
                    toUrl += '&to_date=' + to_date;
                }
               window.location.href = toUrl;

            });

            $('#from_date').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                onShow:function(ct){
                    this.setOptions({
                        maxDate: $('#to_date').val() ? $('#to_date').val() : false
                    })
                },
            });
            $('#to_date').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                onShow:function( ct ){
                    this.setOptions({
                        minDate:$('#from_date').val()?$('#from_date').val():false
                    })
                },
            });
        });
    </script>
@endsection
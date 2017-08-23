@extends('admin.template')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{strtoupper($model)}}</h1>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12">
            @if ($content->id)
                <h2>Edit</h2>
                {!! Form::model($content, ['method' => 'PATCH', 'route' => [$model.'.update', $content->id], 'files' => true]) !!}
            @else
                <h2>Add</h2>
                {!! Form::model($content, ['route' => [$model.'.store'], 'files' => true]) !!}
            @endif

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

                <div class="form-group">
                    {!! Form::label('seo_name', 'SEO Name') !!}
                    {!! Form::text('seo_name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('seo_desc', 'SEO Description') !!}
                    {!! Form::textarea('seo_desc', null, ['class' => 'form-control']) !!}
                </div>




                <div class="form-group">
                    {!! Form::label('Parent', 'Parent') !!}
                    {!! Form::select('parent_id', array('' => 'Chọn chuyên mục') + \App\Site::getParentCategories(), null, ['class' => 'form-control']) !!}
                </div>


            <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('admin.list')

        </div>
    </div>
@endsection
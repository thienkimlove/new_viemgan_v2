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
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('person', 'Ask Person') !!}
                    {!! Form::text('person', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('question', 'Question') !!}
                    {!! Form::textarea('question', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    @if ($content->image)
                        <img src="{{url('img/cache/small/' .$content->image)}}" />
                        <hr>
                    @endif
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('short_answer', 'Short Answer') !!}
                    {!! Form::textarea('short_answer', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('answer', 'Answer') !!}
                    {!! Form::textarea('answer', null, ['class' => 'form-control ckeditor']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('tag_list', 'Tags') !!}
                    {!! Form::select('tag_list[]', \App\Site::getTags(), null, ['id' => 'tag_list', 'class' => 'form-control', 'multiple']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {!! Form::select('status', \App\Site::getStatus(), null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            </div>

            {!! Form::close() !!}

            @include('admin.list')

        </div>
    </div>
@endsection

@section('footer')
    <script>
        $('#tag_list').select2({
            placeholder : 'Choose a tag',
            tags : true //allow to add new tag which not in list.
        });
    </script>
@endsection

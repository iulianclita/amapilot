@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'Laravel') }}</title>
@stop

@section('content')

    <div class="card-title ">
        <div class="container text-center">
            <h3>Edit Video</h3>
        </div>
    </div>
    <div class="container">
        <div class="card-panel">
            {!! Form::model($video, ['route' => ['videos.update', $video->id]]) !!}
                {{ method_field('PATCH') }}

                <div class="form-group">
                    <label for="video-title">Title (Description)</label>
                    {{ Form::text('title', null, ['class'=>'form-control', 'id'=>'video-title', 'placeholder'=>'Ex.: Check out this new awesome video...', 'required']) }}
                </div>

                <div class="form-group">
                    <label for="video-slug">Slug (Video ID)</label>
                    {{ Form::text('slug', null, ['class'=>'form-control', 'id'=>'video-slug', 'placeholder'=>'https://www.youtube.com/watch?v=(qROhsr7Opqk)', 'required']) }}
                </div>

                {{ Form::submit('Save', ['class'=>'btn btn-info']) }}

                <a style="float:right;" href="{{ route('videos.index') }}" class="btn btn-warning">Cancel</a>
            </form>
        </div>
    </div>

@stop

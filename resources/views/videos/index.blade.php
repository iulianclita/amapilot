@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'Laravel') }}</title>
@stop

@section('content')
    <div class="container">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <h4 style="float:left;"><strong>Videos</strong></h4>
                <a style="float:right;" href="{{ route('videos.create') }}" class="btn btn-success btn-sm"><i class="fa fa-plus" aria-hidden="true"></i> Create</a>
                @if ($videos->count() > 0)
                    <table class="table table-responsive table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title (Description)</th>
                            <th>Image Preview</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($videos as $video)
                            <tr>
                                <td>{{ $video->id }}</td>
                                <td>{{ $video->title }}</td>
                                <td><a href="{{ $video->getUrl() }}" target="_blank"><img width="100" height="75" src="{{ $video->getImagePreview() }}" /></a></td>
                                <td><a class="btn btn-primary btn-sm"
                                       href="{{ route('videos.edit', ['id'=>$video->id]) }}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></td>
                                <td><button type="button" class="btn btn-danger btn-sm delete-resource" data-url="{{ route('videos.destroy', ['id'=>$video->id]) }}"><i class="fa fa-times" aria-hidden="true"></i> Delete</button></td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                @else
                    <h1 style="text-align:center;">You have no videos!</h1>
                @endif
            </div>
        </div>
        {{ $videos->links() }}
    </div>
@stop
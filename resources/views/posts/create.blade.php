@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="card card-default">
            <div class="card-header">
                {{ isset($post) ? 'Edit Post' : 'Create Post' }}
            </div>

            <div class="card-body"></div>
                <form action="{{ isset($post) ? route('posts.update' , $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(isset($post))
                        @method('PUT')
                    @endif

                    <div class="container">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{isset($post) ? $post->title: ''}}">
                        </div>

                        <div class="form-group">
                            <label for="information">Information</label>
                            <textarea name="information" id="information" cols="5" rows="3" class="form-control">{{isset($post) ? $post->information: ''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                        {{--<textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>--}}
                            <input id="description" type="hidden" name="description" value="{{isset($post) ? $post->description: ''}}">
                            <trix-editor input="description"></trix-editor>
                        </div>

                        <div class="form-group">
                            <label for="published_at">Published At</label>
                            <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post) ? $post->published_at: ''}}">
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label for="image">Image</label>--}}
{{--                            <input type="file" class="form-control" name="image" id="image">--}}
{{--                        </div>--}}


                        <div type="submit" class="form-group" style="padding-top: 10px ;padding-bottom: 10px;">
                            <button class="btn btn-success">
                                {{ isset($post) ? 'Update Post' : 'Publish Post' }}
                            </button>
                        </div>
                    </div>

                </form>
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true
        })
    </script>


@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

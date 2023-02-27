@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{route('posts.create')}}" class="btn btn-success float-right btn-sm">+ Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>

        <div class="card card-body">
        @if($posts->count() > 0)
                <table class="table">
                    <thead>
                    <th>Title</th>
                    <th>Info</th>
                    <th>Published At</th>

                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post -> title}}
                            </td>
                            <td>
                                {{$post -> information}}
                            </td>
                            <td>
                                {{$post -> published_at}}
                            </td>

                            @if(!$post->trashed())
                                <td>
                                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                                </td>
                            @endif

                            <td>
                                <form action="{{ route('posts.destroy', $post -> id ) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"  class="btn btn-danger btn-sm"> Delete
                                    </button>
                                </form>

                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
            @else
                <h2 class="text-center">No Posts Yet</h2>
        @endif

        </div>

    </div>
@endsection

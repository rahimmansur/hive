@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-end mb-2">
        <a href="{{ route('posts.create') }}" class="btn btn-success float-right btn-sm">+ Add Posts</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Posts</div>

        <div class="card card-body">

            <table class="table">
                <thead>
                <th>Title</th>
                <th>Info</th>
                <th>Published At</th>

                </thead>
                <tbody>
                @forelse($posts as $post)
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
                            <form action="{{ route('posts.destroy', $post -> id ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"> Delete
                                </button>
                            </form>

                        </td>


                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No Posts Yet</td>
                    </tr>
                @endforelse


                </tbody>
            </table>

        </div>

    </div>
@endsection

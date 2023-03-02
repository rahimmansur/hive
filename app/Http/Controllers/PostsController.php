<?php

namespace App\Http\Controllers;


use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostsRequest $request)
    {
        //upload image
        //$image = $request->image->store('posts');
        //create post
        Post::create([
            'title' => $request -> title,
            'information' => $request -> information,
            'description' => $request -> description,
            'published_at'=> $request -> published_at
        ]);
        //flash message
        session()->flash('success','Post created successfully');
        //redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title', 'description', 'published_at', 'information']);

        $post->update($data);

        session()->flash('success', 'Post updated successfully');

        return redirect(route('posts.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();


        if ($post->trashed()) {
            $post->forceDelete();
        } else {
            $post->delete();
        }

        // flash message
        session()->flash('success', 'Post deleted successfully');

        // redirect user
        return redirect(route('posts.index'));
    }

    /**
     * Display a list of trashed posts.
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        //view soft deleted posts
        $trashed = Post::withTrashed()->get();

        //redirect user
        return view('posts.index')->with('posts',$trashed);
    }
}

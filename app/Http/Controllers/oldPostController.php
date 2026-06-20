<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreateRequest;
use App\Http\Requests\Posts\UpdateRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create-post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        // check is image uploaded
        if ($request->hasFile('image')) {
            // check image exists or not
            $imagePath = $request->file('image')->store('posts', 'public');
            // save data to the database
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagePath
            ]);
        }

        // return 'Post Created!';
        session()->flash('post_success', 'Post created Successfully');
        return redirect()->route('posts.create');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // echo $id;
        $post = Post::find($id);

        // if no post available
        if (!$post) {
            abort(404, 'No post available');
        }

        return view('posts.single-post', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);

        // if no post available
        if (!$post) {
            abort(404, 'No post available');
        }

        return view('posts.edit-post', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        // get specific post by id
        $post = Post::findOrFail($id);

        // if no post available
        if (!$post) {
            abort(404, 'No post available');
        }

        // set new values
        $post->title = $request->title;
        $post->description = $request->description;

        $post->save();

        session()->flash('post_success', 'Post Updated Successfully');
        return redirect()->route('posts.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404, 'No post available');
        }

        // delete
        $post->delete();

        session()->flash('post_success', 'Post Deleted Successfully');

        return redirect('posts');
    }
}

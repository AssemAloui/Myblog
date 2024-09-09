<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index($user_id)
  {
    $posts = Post::select('id', 'title', 'body')
      ->where('user_id', $user_id)
      ->get();
    return view("posts", compact("posts"));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->validate([
      'title' => 'required|string|max:255',
      'body' => 'required|string',
      'user_id' => 'required|exists:users,id',
    ]);

    Post::create([
      'title' => $request->input('title'),
      'body' => $request->input('body'),
      'user_id' => $request->input('user_id'),
    ]);

    return redirect()->route('home')->with('status', 'Post created successfully!');
  }

  /**
   * Display the specified resource.
   */
  public function show(Post $post)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Post $post)
  {
    return view('edit', compact('post'));
  }


  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'body' => 'required|string',
    ]);

    $post->update([
      'title' => $request->input('title'),
      'body' => $request->input('body'),
    ]);

    return redirect()->route('posts.index', ['user_id' => Auth::id()])->with('success', 'Post updated successfully!');
  }


  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Post $post)
  {
    $post = Post::find($post->id);
    $post->delete();

    return redirect()->route('posts.index', ['user_id' => Auth::id()])->with('success', 'Post deleted successfully!');
  }
}

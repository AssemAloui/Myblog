<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $posts = DB::table('posts')
      ->join('users', 'posts.user_id', '=', 'users.id')
      ->select('users.name', 'posts.id', 'posts.title', 'posts.body', 'posts.created_at')
      ->paginate(3);
    return view("welcome", compact("posts"));
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
    //
  }

  /**
   * Display the specified resource.
   */
  public function show($id)
  {
    // // $singlepost = Post::findOrFail();
    // $singlepost = DB::table('posts')
    //   ->join('users', 'posts.user_id', '=', 'users.id')
    //   ->select('users.name', 'posts.title', 'posts.body', 'posts.created_at')
    //   ->where('posts.id', '=', $id)
    //   ->first();

    // $posts = DB::table('posts')
    //   ->join('users', 'posts.user_id', '=', 'users.id')
    //   ->select('users.name', 'posts.id', 'posts.title', 'posts.body', 'posts.created_at')
    //   ->where('posts.id', '<>', $id)
    //   ->get();
    // Fetch the main post
    $singlepost = Post::where('id', $id)
      ->firstOrFail();


    // Fetch other posts by the same user, excluding the main post
    $posts = Post::where('id', '!=', $id)
      ->with('user')
      ->get();

    return view("blog", compact("posts", "singlepost"));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}

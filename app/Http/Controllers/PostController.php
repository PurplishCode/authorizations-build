<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = FacadesGate::authorize('create-post');

        if(!$response->allowed()) {
            return abort(403);
        }

        $request->validate(['title' => 'string|required', 'description' => 'string|required']);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'categories' => $request->categories,
            'slug' => Str::slug($request->title),
            'tanggalDibuat' => now(),
            'userID' => auth()->user()->userID,
        ];
$success =        Post::create($data);
if($success) {
    return to_route('home');
}
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post, $id)
    {

   $response = FacadesGate::authorize('update-post', $post);

   if($response->allowed()) {
 return view('update.post', compact('post'));
   }

return redirect()->back()->withErrors('Status Abort 403.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::has('posts')->withCount('posts')->latest()->get();
        return view('admin.posts.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($userid)
    {
        $posts = User::findOrFail($userid)->posts;

        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('Success', 'Post Deleted Successfully');
    }

    public function postStatusUpdate(Request $request) {
        $post = Post::findOrFail($request->id)->update($request->only(['approval_status']));;

        return redirect()->back()->with('Success', 'Status Updated Successfully');
    }

    public function addFakePosts(){
        Post::factory(10)->create();
        return redirect()->back()->with('Success', 'Posts Added Successfully');
    }

    public function sendMessage(Request $request){

        $user =User::find($request->id)->first();
        \Mail::to($user->email)->send(new \App\Mail\SubAdminCreatedMail($details));

        dd($request);
        return redirect()->back()->with('Success', 'Posts Added Successfully');
    }
}

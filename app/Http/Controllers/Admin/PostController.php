<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Requests\admin\PostRequest;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Session;

class PostController extends Controller
{
   //Display Home Page
    public function home()
    {
        $posts = Post::count();
        return view('admin.index',compact('posts'));
    }

    //Displat Posts
    public function index()
    {
        $data = Post::all();
        return view('admin.post.index',compact('data'));
    }
    //Create Post
    public function create()
    {
        $users = User::all();
        return view('admin.post.create',compact('users'));
    }

    //Store Post
    public function store(PostRequest $request)
    {
        $data = $request->all();
        Post::create($data);
        Session::flash('success','تمت الاضافة بنجاح');

        return redirect(route('posts.index'));
        
    }

   //Edit Post
    public function edit($id)
    {
        $users = User::all();
        $info = Post::find($id);
        return view('admin.post.edit',compact('info','users'));
    }

    //Update Post
    public function update(PostRequest $request , $id)
    {
        $data = $request->all();
        Post::where('id',$id)->first()->update($data);
        Session::flash('success','تم تعديل البيانات بنجاح');
        return redirect()->back();
    }

    //Delete Post

    public function destroy($id)
    {
        Post::find($id)->delete();
        Session::flash('success','تم حذف البيانات بنجاح');
        return redirect()->back();
    }

    
}

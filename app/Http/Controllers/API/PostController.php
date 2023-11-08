<?php

namespace App\Http\Controllers\Api;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;

class PostController extends Controller
{
    //display all posts
    public function index()
    {
        $posts = Post::all();
        return response()->json([   
            'data' => $posts,
            'success' => true,
        ],200);
    }

   //create new post
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:posts|min:3',
            'content' => 'required|min:50',
            ]);
        $data['user_id'] = auth()->user()->id;
        $post = Post::create($data);
        return response()->json([
            'data' => $post,
            'success' => true,
        ],200);
    }

    //update post
    public function update(Request $request , $id)
    {
        $post= Post::findOrFail($id);
        $data = $request->validate([
            'title' => 'required|unique:posts|min:3',
            'content' => 'required|min:50',
            ]);
        $data['user_id'] = auth()->user()->id;
        
        if($post->user_id ==auth()->user()->id){
            $post->update($data);
            return response()->json([
                'data' => $post,
                'success' => true,
            ],200);
        }else{
            dd(3333);
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }
        
    }

    //show post
    public function show($id){
        
        $post = Post::where('posts.id',$id)->select('posts.id','posts.title','posts.content','users.name as user')->join('users','users.id','=','posts.user_id')->first();
        
        return response()->json([   
            'data' => $post,
            'success' => true,
        ],200);
    }

    
//delete post
    public function destroy($id){
        $post = Post::find($id);
        if($post->user_id ==auth()->user()->id){
            $post->delete();
            return response()->json([
                'message' => 'تم الحذف',
                'success' => true,
            ],200);
        }else{
            return response()->json([
                'message' => 'لا يوجد لديك الصلاحيات',
                'success' => false,
            ],442);
        }
    }

    

}

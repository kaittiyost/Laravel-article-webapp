<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('post.index',compact('posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function edit($post_id){
        $post = Post::where('id',$post_id)->first();
        return view('post.edit',compact('post'));
    }

    public function delete($post_id){
        $post = Post::where('id',$post_id)->first();
        if($post->post_image){
            @unlink(public_path().'/images/posts/'.$post->$post_image);
        }
        $post->delete();
        return redirect('/posts');
    }

    public function update(Request $request, $post_id){
        $post = Post::where('id',$post_id)->first();
        if($request->hasFile('post_image')){
            $file = $request->file('post_image');
            $file_name = md5(time()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/posts/'), $file_name);


            if($post->post_image){
                @unlink(public_path().'/images/posts/'.$post->$post_image);
            }
            $post->post_image = $file_name;
        }
        $post->post_name = $request->post_name;
        $post->post_content = $request->post_content;

        $post->save();

        return redirect('/posts');
    }


    public function store(Request $request){
        if($request->hasFile('post_image')){
            $file = $request->file('post_image');
            $file_name = md5(time()) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/images/posts/'), $file_name);
        }else{
            $file_name = '';
        }
        Post::create([
            'post_name' => $request->post_name,
            'post_content' => $request->post_content,
            'post_image' => $file_name,
            'user_id' => Auth::id(),
        ]);
        return redirect('/posts');
    }
}

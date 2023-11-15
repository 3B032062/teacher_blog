<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function index()
    {
        /*SELECT * FORM posts ORDER BY id DESC 最新的會放在前面*/
        $posts = Post::orderBy('id', 'DESC')->get();

        /*測試用程式 dunp & die
        dd($posts);
        */

        //陣列顯示名稱 => 資料來源
        $data = [
            'posts' => $posts,
        ];

        return view('admin.posts.index', $data);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        Post::create($request->all());
        //dd($request->all()); 測試

        return redirect()->route('admin.posts.index');
    }

    public function edit(Post $post)
    {
        $data = [
            'post' =>$post
        ];


        return view('admin.posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

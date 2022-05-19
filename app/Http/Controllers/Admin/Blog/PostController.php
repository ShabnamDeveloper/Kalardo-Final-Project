<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::query();
        if ($keyword = $request->search) {

            $posts = Post::where('title', 'LIKE', "%{$keyword}%");
        }
        $posts = $posts->latest()->paginate(20);
        return view('admin.post.all', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'slug' => 'required|min:3',
            'body' => 'nullable',
            'published_at' => 'nullable',
            'description' => 'nullable',
            'meta_description' => 'nullable',
            'image' => 'nullable',
            'meta_title' => 'nullable',
            'status' => 'nullable',
            'tag_id' => 'nullable',
            'author_id' => 'nullable',
            'cat_post_id' => 'nullable',
        ]);
        $post = Post::create($data);
        $post->tags()->attach($request->tag);
        alert()->success('دسته بندی جدید با موفقیت ایجاد شد');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post_tag = PostTag::where('post_id', $post->id)->first();
        return view('admin.post.edit', compact('post', 'post_tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $data = $request->validate([
            'title' => 'required|min:3',
            'slug'             => ['required','min:3',Rule::unique('posts')->ignore($post->id)],
            'body' => 'nullable',
            'published_at' => 'nullable',
            'description' => 'nullable',
            'meta_description' => 'nullable',
            'image' => 'nullable',
            'meta_title' => 'nullable',
            'status' => 'nullable',
            'author_id' => 'nullable',
            'tag_id' => 'nullable',
            'cat_post_id' => 'nullable',
        ]);
        $post->update($data);
        $post_tag = PostTag::where('post_id', $post->id)->first();
        if ($post_tag <> null){
        foreach ($data['tag_id'] as $tag_id){
            dd($tag_id);
            $post_tag->update(['tag_id' => $tag_id]);
        }
        }
         alert()->success('دسته بندی جدید با موفقیت ایجاد شد');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post)
    {
        $post=Post::find($post);
        $post->delete();
        return back();
    }
}

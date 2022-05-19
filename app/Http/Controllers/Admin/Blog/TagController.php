<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Tag;
use Illuminate\Validation\Rule;

class TagController extends Controller
{

    public function index(Request $request)
    {
        $tags = Tag::query();

        if($keyword = $request->search){

            $tags =Tag::where('title','LIKE',"%{$keyword}%");
        }
        $tags = $tags->latest()->paginate(20);
        return view('admin.tag.all',compact('tags'));
    }


    public function create()
    {
       return view('admin.tag.create');
    }

    public function store(Request $request)
    {

        $validData = $request->validate([
            'title'     => 'required|',
            'meta_title' => 'required',
            'description'      => 'required',
            'meta_description' => 'required',
            'status'           => 'required',
        ]);

       Tag::create($validData);

        alert()->success('تگ مورد نظر با موفقیت ایجاد شد ');
        return redirect(route('tag.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',compact('tag'));
    }


    public function update(Request $request,Tag $tag)
    {
        $validData = $request->validate([
            'title'     => 'required',
            'meta_title' => 'required',
            'description'      => 'required',
            'meta_description' => 'required',
            'status'           => 'required',
        ]);
        $tag->update($validData);
        alert()->success('شهر مورد نظر با موفقیت ویرایش شد ');
        return redirect(route('tag.index'));
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        alert()->success('شهر مورد نظر با موفقیت حذف شد ');
        return back();
    }
}

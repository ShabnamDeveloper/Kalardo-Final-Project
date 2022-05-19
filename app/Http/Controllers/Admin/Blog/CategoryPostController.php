<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use App\Models\CategoryPost;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function __construct()
    {
        $this->middleware('can:show-category-post')->only('index');
        $this->middleware('can:create-category-post')->only(['create','store']);
        $this->middleware('can:edit-category-post')->only(['update','edit']);
        $this->middleware('can:delete-category-post')->only('destroy');
    }
    public function index(Request $request)
    {
        $cat_posts = CategoryPost::query();

        if ($keyword = $request->search) {

            $cat_posts = CategoryPost::where('name','LIKE',"%{$keyword}%");
        }

        $cat_posts = $cat_posts->latest()->paginate(20);
        return view('admin.category-post.all',compact('cat_posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category-post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|min:3',
            'slug'             => ['required','min:3','unique:categories,slug'],
            'parent_id'        => 'nullable',
            'description'      => 'nullable',
            'meta_description' => 'nullable',
            'image'            => 'nullable',
            'meta_title'       => 'nullable',
            'status'           => 'nullable',
            'category_id'       => 'nullable',
        ]);
        CategoryPost::create($data);
        alert()->success('دسته بندی جدید با موفقیت ایجاد شد');
        return redirect(route('category-post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  CategoryPost $cat_post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  CategoryPost $cat_post
     * @return \Illuminate\Http\Response
     */
    public function edit($cat_pst)
    {
        $cat_pst=CategoryPost::find($cat_pst);
        return view('admin.category-post.edit',compact('cat_pst'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$cat_pst)
    {
        $cat_pst=CategoryPost::find($cat_pst);

        $data = $request->validate([
            'name'             => 'required|min:3',
            'slug'             => ['required','min:3',Rule::unique('category_posts')->ignore($cat_pst->id)],
            'parent_id'        => 'nullable',
            'image'            => 'nullable',
            'description'      => 'nullable',
            'meta_description' => 'nullable',
            'meta_title'       => 'nullable',
            'status'           => 'nullable',
            'category_id'       => 'nullable',
        ]);
        $cat_pst->update($data);
        alert()->success('ویرایش با موفقیت انجام شد');
        return redirect(route('category-post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CategoryPost $cat_post
     * @return \Illuminate\Http\Response
     */
    public function destroy($cat_post)
    {
        $cat_post=CategoryPost::find($cat_post);
        $cat_post->delete();
        return back();
    }
}

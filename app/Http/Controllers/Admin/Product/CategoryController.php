<?php

namespace App\Http\Controllers\Admin\product;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:show-category')->only('index');
        $this->middleware('can:create-category')->only(['create','store']);
        $this->middleware('can:edit-category')->only(['update','edit']);
        $this->middleware('can:delete-category')->only('destroy');
    }
    public function index(Request $request)
    {
        $categories = Category::query();

        if ($keyword = $request->search) {

            $categories = Category::where('name','LIKE',"%{$keyword}%");
        }

        $categories = $categories->latest()->paginate(20);
        return view('admin.category.all',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'sort_order'       => 'nullable',
            'top'              => 'nullable',
            'description'      => 'nullable',
            'meta_description' => 'nullable',
            'image'            => 'nullable',
            'meta_title'       => 'nullable',
            'status'           => 'nullable',
        ]);
        Category::create($data);
         alert()->success('دسته بندی جدید با موفقیت ایجاد شد');
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name'             => 'required|min:3',
            'slug'             => ['required','min:3',Rule::unique('categories')->ignore($category->id)],
            'parent_id'        => 'nullable',
            'top'              => 'nullable',
            'sort_order'       => 'nullable',
            'image'            => 'nullable',
            'description'      => 'nullable',
            'meta_description' => 'nullable',
            'meta_title'       => 'nullable',
            'status'           => 'nullable'
        ]);
        $category->update($data);
        alert()->success('ویرایش با موفقیت انجام شد');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}

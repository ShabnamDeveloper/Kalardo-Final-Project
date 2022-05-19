<?php

namespace App\Http\Controllers\Admin\Show;

use App\Models\AdditionalPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdditionalPageController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('can:show-additionalpage')->only('index');
        $this->middleware('can:edit-additionalpage')->only(['edit','update']);
        $this->middleware('can:create-additionalpage')->only(['create','store']);
        $this->middleware('can:delete-additionalpage')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $additionalPages = AdditionalPage::query();
        if ($keyword = $request->search) {
            $additionalPages = AdditionalPage::where('name','LIKE',"%{$keyword}%")->orWhere('phone','LIKE',"{$keyword}");
        }
        $additionalPages = $additionalPages->latest()->paginate(20);
        return view('admin.additional_page.all',compact('additionalPages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.additional_page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(
            ['name'            => 'required',
                'slug'             => 'required|min:3|unique:additional_pages,slug',
                'status'           => 'required',
                'meta_title'       => 'required',
                'meta_description' => 'required',
                'description'      => 'required',
            ]
        );
        AdditionalPage::create($data);
        alert()->success('صفحه جدید با موفقیت ایجاد شد');
        return redirect(route('additionalPage.index'));

    }

    /**
     * Display the specified resource.

     * @param  \App\Models\AdditionalPage  $additionalPage
     * @return \Illuminate\Http\Response
     */
    public function show(AdditionalPage $additionalPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdditionalPage  $additionalPage
     * @return \Illuminate\Http\Response
     */
    public function edit(AdditionalPage $additionalPage)
    {
        return view('admin.additional_page.edit',compact('additionalPage'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdditionalPage  $additionalPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdditionalPage $additionalPage)
    {
        $data = $request->validate(
            ['name'            => 'required',
                'slug'             => ['required','min:3',Rule::unique('additional_pages')->ignore($additionalPage->id)],
                'status'           => 'required',
                'meta_title'       => 'required',
                'meta_description' => 'required',
                'description'      => 'required',
            ]
        );
        $additionalPage->update($data);
        alert()->success('صفحه مورد نظر با موفقیت ویرایش شد');
        return redirect(route('additionalPage.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdditionalPage  $additionalPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdditionalPage $additionalPage)
    {
        $additionalPage->delete();
        alert()->success('صفحه مورد نظر با موفقیت حذف شد');
        return back();

    }
}

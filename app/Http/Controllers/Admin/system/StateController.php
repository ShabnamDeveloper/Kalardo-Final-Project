<?php

namespace App\Http\Controllers\Admin\system;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class StateController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('can:show-state')->only('index');
        $this->middleware('can:create-state')->only(['create','store']);
        $this->middleware('can:edit-state')->only(['update','edit']);
        $this->middleware('can:delete-state')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $states = State::query();

        if ($keyword = $request->search) {

            $states = State::where('name', 'LIKE', "%{$keyword}%");
        }

        $states = $states->latest()->paginate(20);
        return view('admin.state.all', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.state.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData = $request->validate([
            'name' => 'required|unique:states'
        ]);

        State::create($validData);
        alert()->success('استان مورد نظر با موفقیت ایجاد شد ');
        return redirect(route('state.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\State $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\State $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        return view('admin.state.edit', compact('state'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\State $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        $validData = $request->validate([
            'name' => ['required', Rule::unique('states')->ignore($state->id)]
        ]);

        $state->update($validData);
        alert()->success('استان مورد نظر با موفقیت ویرایش شد ');
        return redirect(route('state.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\State $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        alert()->success('استان مورد نظر با موفقیت حذف شد');
        return back();
    }

    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
            ->where("state_id",$request->state_id)
            ->pluck("name","id");
//        $cities=City::where('state_id',$request->state_id)->get()->name;
        return response()->json($cities);
    }
}

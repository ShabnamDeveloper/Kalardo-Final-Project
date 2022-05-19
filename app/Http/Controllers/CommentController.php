<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Class constructor.
     */
//    public function __construct()
//    {
//        $this->middleware('can:show-comment')->only('index');
//        $this->middleware('can:delete-comment')->only('destroy');
//        $this->middleware('can:edit-comment')->only(['edit','approved']);
//    }
    public function index(Request $request)
    {
        $comment = Comment::query();

        if ($keyword = $request->keyword) {
            $comment->whereName('LIKE',"%$keyword%")->orWhereComment('LIKE',"%$keyword%");
        }
        $comments  =$comment->latest()->paginate(20);

        return view('admin.comment.all',compact('comments'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin.comment.edit',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'comment' => 'required'
        ]);
        $comment->update($data);
//        alert()->success('نظر با موفقیت ویرایش شد');
        return redirect(route('comment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $comment->child()->delete();
//        alert()->success('نظر با موفقیت حذف شد');
        return back();
    }

    public function approved(Comment $comment){

        $comment->update(['approved'=>1]);

//        alert()->success('نظر با موفقیت تایید شد');
        return back();
    }
}

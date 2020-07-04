<?php

namespace App\Http\Controllers\Blog;

use App\Models\BlogComment;
use Illuminate\Http\Request;
use Validator;

class BlogCommentController extends BaseController
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'name' => 'required',
           'text' => 'min:10'
        ]);
        if($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput();
        } else {
            $data = [
                'name' => $request->input('name'),
                'text' => $request->input('text'),
                'post_id' => $request->input('post_id'),
            ];
            BlogComment::create($data);
            return back()
                ->withSuccess('Комментарий принят, он появится посл модерции');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogComment  $blogComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogComment $blogComment)
    {
        //
    }
}

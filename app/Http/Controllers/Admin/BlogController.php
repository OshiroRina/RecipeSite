<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::select()
            ->orderBy('id', 'desc')
            ->get();

        return Inertia::render('Admin/Blog/Index', [
            'blogs' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Blog/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (isset($request->image)) {
            $file_name = $request->file('image')[0]->getClientOriginalName();
            $request->file('image')[0]->storeAs('public/images/blogs' , $file_name);
        };

        try {
            DB::beginTransaction();
            Blog::create([
                'title' => $request->title,
                'context' => $request->context,
                'image' => $request->file('image') ? '/images' . '/blogs' . '/' . $request->file('image')[0]->getClientOriginalName() : null,
            ]);
            DB::commit();

            return to_route('admin.blog.index')->with([
                'message' => 'ブログを登録しました',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return to_route('admin.blog.index')->with([
                'message' => 'ブログの登録に失敗しました',
                'status' => 'danger',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);

        return Inertia::render('Admin/Blog/Edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::where('id',$id)->first();

        dd($blog->image,$request,$request->image);

        $blog->title = $request->title;
        $blog->context = $request->context;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

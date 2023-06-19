<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::select()
        ->orderBy('id','desc')
        ->get();

        return Inertia::render('User/BlogIndex', [
            'blogs' => $blogs
        ]);
    }

    public function show($id)
    {
        $blog = Blog::find($id);

        return Inertia::render('User/BlogDetail', [
            'blog' => $blog
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremyBlogRequest;
use App\Http\Requests\UpdatemyBlogRequest;
use App\Models\myBlog;

class MyBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $myBlogs = myBlog::all();
        return view('myBlogs.index', ['myBlogs' => $myBlogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('myBlogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremyBlogRequest $request)
    {
        $myBlog = new myBlog([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        $myBlog->save();

        return redirect('/myBlogs')->with('success', 'myBlog has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(myBlog $myBlog)
    {
        return view('myBlogs.show', ['myBlog' => $myBlog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(myBlog $myBlog)
    {
        return view('myBlogs.edit', ['myBlog' => $myBlog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemyBlogRequest $request, myBlog $myBlog)
    {
        $myBlog->title = $request->input('title');
        $myBlog->content = $request->input('content');
        $myBlog->save();

        return redirect('/myBlogs')->with('success', 'myBlog has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(myBlog $myBlog)
    {
        $myBlog->delete();

        return redirect('/myBlogs')->with('success', 'myBlog has been deleted successfully');
    }
}

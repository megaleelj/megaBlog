<?php

namespace App\Http\Controllers;

use App\Models\myBlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class MyBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index', 'show' ]]);
    }
    
    public function index()
    {
        $blog = myBlog::orderBy('created_at','desc')->paginate(8);
        return view('Blogs.index')->with('blog', $blog);
    }

    public function dashboard()
    {
        $blog = myBlog::orderBy('created_at','desc')->paginate(8);
        return view('dashboard')->with('blog', $blog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'blog_heading' => 'required',
            'blog_body' => 'required',
            'blog_image1' => 'image|nullable|max:1999|required',
            'blog_image2' => 'image|nullable|max:1999|required',
            'blog_image3' => 'image|nullable|max:1999|required'
            ]);

        //Handle file upload
        if($request->hasFile('blog_image1')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image1')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image1')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image1')->storeAs('public/blog_images', $fileNameToStore1);
        }

        if($request->hasFile('blog_image2')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image2')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image2')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image2')->storeAs('public/blog_images', $fileNameToStore2);
        }

        if($request->hasFile('blog_image3')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image3')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image3')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore3 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image3')->storeAs('public/blog_images', $fileNameToStore3);
        }

        //create blog
        $blog = new myBlog;
        $blog ->blog_heading = $request->input('blog_heading');
        $blog ->blog_body = $request->input('blog_body');
        $blog ->user_id = auth()->user()->id;
        $blog->blog_image1 = $fileNameToStore1;
        $blog->blog_image2 = $fileNameToStore2;
        $blog->blog_image3 = $fileNameToStore3;
        $blog ->save();

        return redirect('/myBlogs') ->with('success','blog created succssfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\myBlog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($blog)
    {
        $blog = myBlog:: find($blog);
        return view('Blogs.show')->with('blog', $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\myBlog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = myBlog:: find($id);
        if(auth()->user()->id !==$blog->user_id){
            return redirect('/myBlogs')->with('error', 'Unauthorised Page');
        }
        return view('Blogs.edit')->with('blog', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\myBlog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'blog_heading' => 'required',
            'blog_body' => 'required',
            'blog_image1' => 'image|nullable|max:1999|'
            
            ]);

        //Handle file upload
        if($request->hasFile('blog_image1')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image1')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image1')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore1 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image1')->storeAs('public/blog_images', $fileNameToStore1);
        }

        if($request->hasFile('blog_image2')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image2')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image2')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore2 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image2')->storeAs('public/blog_images', $fileNameToStore2);
        }

        if($request->hasFile('blog_image3')){
            //Get filename with extension
            $filenameWithExt = $request->file('blog_image3')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('blog_image3')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore3 = $filename.'_'.time().'.'.$extension;

            $path = $request->file('blog_image3')->storeAs('public/blog_images', $fileNameToStore3);
        }

        //create blog
        $blog = myBlog::find($id);
        $blog ->blog_heading = $request->input('blog_heading');
        $blog ->blog_body = $request->input('blog_body');
        if($request->hasFile('blog_image1')){
            $blog->blog_image1 = $fileNameToStore1;
            $blog->blog_image2 = $fileNameToStore2;
            $blog->blog_image3 = $fileNameToStore3;
        }
        $blog ->save();

        return redirect('/blog') ->with('success','blog updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\myBlog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $blog = myBlog::find($id);
        if(auth()->user()->id !=$blog->user_id){
            return redirect('/blog')->with('error', 'Unauthorized Page');
        }
        Storage::delete('public/blog_images/'.$blog->blog_image1);
        Storage::delete('public/blog_images/'.$blog->blog_image2);
        Storage::delete('public/blog_images/'.$blog->blog_image3);
        $blog->delete();
        return redirect('/blog') ->with('success','blog deleted');

    }
}
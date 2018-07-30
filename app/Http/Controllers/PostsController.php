<?php

namespace App\Http\Controllers;

use App\Tags;
use App\Category;
use App\Post;
use Session;
use Illuminate\Http\Request;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.posts.index')->with('all_posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_cat = Category::all();
        if($all_cat->count() == 0 ){
            Session::flash('info','You Must Have Some Categories Befour Attempting to Create Posts');
            return redirect()->back();
        }
        return view('admin.posts.create')->with('all_cat',$all_cat)->with('tags',Tags::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//dd($request->all());

        $this->validate($request,[
            'title' => 'required',
            'featured' => 'image',
            'content' => 'required',
            'category_id'=> 'required'
          
        ]);

        $featured_image = $request->featured;
        $featured_image_new_name = time().$featured_image->getClientOriginalName();
            $featured_image->move('upload_images/post_image',$featured_image_new_name);

            $create_post = Post::create([
               'title' => $request->title,
               'featured' => 'upload_images/post_image/' .$featured_image_new_name,
               'content' => $request->content,
               'category_id' => $request->category_id,
               'slug' => str_slug($request->title)
                    
            ]);
        $create_post->tag()->attach($request->tag);
            Session::flash('success',"Post Created");
            return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::findOrFail($id);
        return view('admin.posts.edit')->with('post',$posts)->with('selected_cat',Category::all());
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

              $this->validate($request,[
                  'title' => 'required',
                  'featured' => 'image',
                  'content' => 'required',
                  'category_id'=> 'required'
              ]);

              $post = Post::find($id);

        $featured_image = $request->featured;
        $featured_image_new_name = time().$featured_image->getClientOriginalName();
            $featured_image->move('upload_images/post_image',$featured_image_new_name);

                     $post->title = $request->title;
                     //$post->featured => 'upload_images/post_image/' .$featured_image_new_name,
                     $post->content = $request->content;
                     $post->featured = $featured_image_new_name;

                     $post->category_id = $request->category_id;
                  $post->save();
                  Session::flash('success',"Post Update");
                  return redirect()->route('posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post = Post::findOrfail($id);
      $post->delete();
      Session::flash('success','Post has been trash');
      return redirect()->back();
    }

    public function trashed(){
        $trash_post = Post::onlyTrashed()->get();
        return view('admin.posts.trash')->with('all_trashed_posts' , $trash_post);
    }

    public function kill($id){
        $kill_post = Post::withTrashed()->where('id' ,$id)->first();
        $kill_post->forceDelete();
        Session::flash('success',"Post Deleted Permanently");
        return redirect()->back();
    }

    public function restore($id){
        //find trashed method
        $post = Post::withTrashed()->where('id',$id)->first();
        //restore method call
        $post->restore();
        Session::flash('succcess',"Post Restore");
        return redirect()->back();
    }
}